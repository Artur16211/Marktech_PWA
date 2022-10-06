<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateorderController extends Controller
{
    private $PayPalController;

    private $stripeController;

    public function __construct(PayPalController $PayPalController, StripeController $StripeController)
    {
        $this->PayPalController = $PayPalController;
        $this->StripeController = $StripeController;
    }

    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];

        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Carrito';
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        //get all addresses

        $productsInSession = $request->session();
        $userId = Auth::user()->getId();
        $address = new Order();

        $address = DB::table('addresses')->where('user_id', '=', $userId)->get(); // get the address id of the user

        return view('cart.payment')->with('viewData', $viewData)->with('addresses', $address);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart.payment');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    //real puchase function
    public function puchase(Request $request)
    {
        $ammount = $request->input('total');

        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setImage($product->getImage());
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setDiscountedPrice($product->getDiscountedPrice());
                $item->setTotal($product->getPrice() - $product->getDiscountedPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                //discount price in paypal
                $total = $total + ($product->getPrice() * $quantity - $product->getDiscountedprice() * $quantity);
            }
            $order->address = $request->address;
            $order->setTotal($total);
            $order->save();

            //rest a product in stock
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $product->setStock($product->getStock() - $quantity);
                $product->save();
            }

            // sum the sales of the products
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $product->setSales($product->getSales() + $quantity);
                $product->save();
            }

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['title'] = 'Marktech';
            $viewData['subtitle'] = 'Estado de compra';
            $viewData['order'] = $order;

            // return the view show of the order created
            return view('cart.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('product.index');
        }
    }

    // function to complete existing order
    public function completeOrder(Request $request)
    {
        // get the $id from the form input

        $id = $request->input('id');
        $ammount = $request->input('total');

        if ($request->input('payment_method') == 'paypal') {
            return $this->PayPalController->payment($id, $ammount);
        } else {
            return redirect()->route('product.index');
        }
    }
}
