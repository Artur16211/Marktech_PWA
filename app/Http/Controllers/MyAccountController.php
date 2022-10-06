<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Mis pedidos';
        $viewData['orders'] = Order::latest()->with(['items.product'])->where('user_id', Auth::user()->getId())->where('total', '>', 0)->Paginate(5);

        //select the order if "created_at" is 4 days old and state is "no pagado", change state to "cancelado"
        $orderp = Order::whereDate('created_at', '<', Carbon::now()->subDays(4))->where('paid', '=', 'No Pagado')->get();
        // $orders = Order::where('paid', '=', 'No Pagado')->get();
        foreach ($orderp as $order) {
            $order->paid = 'Cancelado';
            $order->save();
        }

        //if paid is "Cancelado" get the items from the order and recover the stock
        $orders = Order::where('paid', '=', 'Cancelado')->where('canceled_restored', '=', 'No')->get();
        foreach ($orders as $order) {
            $items = $order->items;
            foreach ($items as $item) {
                $product = $item->product;
                $product->stock = $product->stock + $item->quantity;
                $product->sales = $product->sales - $item->quantity;
                $product->save();

                $order->canceled_restored = 'Si';
                $order->save();
            }
        }

        return view('myaccount.orders')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];

        $order = Order::findByHashidOrFail($id);

        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Mis pedidos';
        $viewData['orders'] = $order;

        return view('myaccount.orders.show')->with('viewData', $viewData);
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->paid = 'Cancelado';
        $order->save();

        return redirect()->route('myaccount.orders');
    }

    //get current user
    public function edit(Request $request)
    {
        // update current user
        $user = User::find(Auth::user()->getId());

        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Editar perfil';
        $viewData['user'] = $user;

        return view('myaccount.edit')->with('viewData', $viewData);
    }

    public function update(Request $request)
    {
        // update current user
        $user = User::find(Auth::user()->getId());

        $user->name = $request->name;
        $user->save();

        return redirect()->route('myaccount.edit');
    }

    public function getUser()
    {
        $user = Auth::User()->name;

        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Mi cuenta';
        $viewData['user'] = $user;

        return view('myaccount.my')->with('viewData', $viewData);
    }
}
