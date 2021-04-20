<?php

namespace App\Http\Controllers;

use App\Mail\PayMail;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    public function show($name)
    {
        $restaurant= User::where('restaurant_name', $name)->get()->first();
        //   dd($restaurant);
        return view('public-menu', compact('restaurant'));
    }

    //qui riporto al checkout
    public function checkout($name)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'xgv64xj9j3frqv3b',
            'publicKey' => 'vmfv5dfmsynzxhdr',
            'privateKey' => '7f6c22d8dffcccc4eb93413fecff9d4e'
        ]);
        $token = $gateway->ClientToken()->generate();
        // il token serve a laravel per dire che la richiesta viene da form dell'app
        $restaurant = User::where('restaurant_name', $name)->firstOrFail();
        return view('checkout', compact('restaurant', 'token'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder['order_active'] = 1;
        $newOrder['notes'] = 'Consegna prevista nelle prossime ore';
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'xgv64xj9j3frqv3b',
            'publicKey' => 'vmfv5dfmsynzxhdr',
            'privateKey' => '7f6c22d8dffcccc4eb93413fecff9d4e'
        ]);
        $newOrder->save();
        //    devo associare gli ordini ai piatti
        // col count dell'array della quantità che ho passato con input hidden
        $count = 0;
        for ($j=0; $j < count($data['quantity']) ; $j++) {
            $quantity = $data['quantity'][$j];
            for ($i=0; $i < $quantity ; $i++) {
                $newOrder->dishes()->attach($data['dishes'][$count]);
            }
            $count++;
            $amount = $request->amount;
            $nonce = $request->payment_method_nonce;

            $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        //    se la transazione ha successo mando email al cliente dell'ordine
            if ($result->success) {
                $transaction = $result->transaction;
                Mail::to($newOrder->customer_email)->send(new PayMail($newOrder));
                return redirect()->route('purchase-made', ['transaction'=>$transaction,'newOrder'=>$newOrder]);
            } else {
                $errorString = "";

                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }

                return back()->withErrors('An error occurred with the message: '.$result->message);
            }
        }
    }
}
