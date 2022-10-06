<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{

    public function payment($id)
    {
        $order = Order::find($id);
        // set the state of the order 1=paid 0/null=not paid
        $order->paid = 'Pagado';
        $order->save();

        Auth::user()->save();

        $viewData['order'] = $order;

        toastr()->info('Pago Completado', ' ');

        return redirect()->route('myaccount.orders');
    }

    public function cancel()
    {
        toastr()->error('Pago Cancelado', ' ');
        return redirect()->route('myaccount.orders');
    }
}
