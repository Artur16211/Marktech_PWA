<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;

class PayPalController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function payment($id, $ammount)
    {
        try {
            $response = $this->gateway->purchase([

                // get amount from the last record in the total column from orders table
                'amount' => $ammount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('completesuccess', $id),
                'cancelUrl' => url('error'),
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable$th) {
            return $th->getMessage();
        }
    }

    public function completesuccess(Request $request, $id)
    {
        // dd($request);

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                $order = Order::find($id);
                // set the state of the order 1=paid 0/null=not paid
                $order->paid = 'Pagado';
                $order->save();

                Auth::user()->save();

                $request->session()->forget('products');

                $viewData = [];
                $viewData['title'] = 'Marktech - Comprar';
                $viewData['subtitle'] = 'Estado del Pedido';
                $viewData['order'] = $order;

                toastr()->info('Pago Completado', ' ');
                return redirect()->route('myaccount.orders');
            } else {
                return '¡Pago declinado!';
            }
        } else {
            return '¡Pago declinado!';
        }
    }

    public function error()
    {
        toastr()->error('Pago Cancelado', ' ');
        return redirect()->route('myaccount.orders');
    }
}
