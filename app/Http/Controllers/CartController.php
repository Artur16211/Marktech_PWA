<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
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

        // if product is in cart then show it in cart
        if (count($productsInCart) > 0) {
            return view('cart.index')->with('viewData', $viewData);
        } else {
            return view('cart.noproducts');
        }
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        // notify user that product was added to cart
        toastr()->info('Producto agregado al carrito', ' ');

        // redirect to same page
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    public function purchase(Post $post, Request $request)
    {
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
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity - $product->getDiscountedprice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['title'] = 'Marktech - Comprar';
            $viewData['subtitle'] = 'Estado del Pedido';
            $viewData['order'] = $order;

            return view('cart.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.purchase');
        }
    }
}
