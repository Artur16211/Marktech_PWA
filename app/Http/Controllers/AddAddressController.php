<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddAddressController extends Controller
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

        //get all addresses

        $productsInSession = $request->session();
        $userId = Auth::user()->getId();
        $address = new Order();

        $address = DB::table('addresses')->where('user_id', '=', $userId)->get(); // get the address id of the user

        return view('form.addaddress')->with('viewData', $viewData)->with('addresses', $address);
    }

    public function addaddress(Request $request)
    {
        $productsInSession = $request->session()->get('products');
        $userId = Auth::user()->getId();
        $address = new Order();
        $address->setUserId($userId);
        $address->save();

        DB::table('addresses')->insert([
            'user_id' => $userId, 'nombre' => $request->nombre, 'postal' => $request->postal, 'estado' => $request->estado, 'municipio' => $request->municipio, 'colonia' => $request->colonia, 'calle' => $request->calle, 'exterior' => $request->exterior, 'interior' => $request->interior, 'calle1' => $request->calle1, 'calle2' => $request->calle2, 'tipo' => $request->tipo, 'telefono' => $request->telefono, 'extra' => $request->extra,
        ]);

        $address->save();

        $viewData['address'] = $address;

        return view('form.addaddress')->with('viewData', $viewData)->with('addresses', $address);
    }
}
