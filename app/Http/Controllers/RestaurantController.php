<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show($name){
  $restaurant= User::where('restaurant_name',$name)->get()->first();
    //   dd($restaurant);
      return view('public-menu',compact('restaurant'));
    }

    //qui riporto al checkout
    public function  checkout($name){
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'xgv64xj9j3frqv3b',
            'publicKey' => 'vmfv5dfmsynzxhdr',
            'privateKey' => '7f6c22d8dffcccc4eb93413fecff9d4e'
        ]);
        $token = $gateway->ClientToken()->generate();
        $restaurant = User::where('restaurant_name',$name)->firstOrFail();
        return view('checkout', compact('restaurant', 'token'));
    }
    public function store(Request $request) {
        $data = $request->all();
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder['order_active'] = 1;
        $newOrder['notes'] = 'La consegna avverrà nelle prossime ore';
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'xgv64xj9j3frqv3b',
            'publicKey' => 'vmfv5dfmsynzxhdr',
            'privateKey' => '7f6c22d8dffcccc4eb93413fecff9d4e'
        ]);
           $newOrder->save();
        //    devo associare gli ordini ai piatti
        // col count dell'array della quantità
           $count = 0;
           for ($j=0; $j < count($data['quantity']) ; $j++) {
               $quantity = $data['quantity'][$j];
               for ($i=0; $i < $quantity ; $i++) {
                   $newOrder->dishes()->attach($data['dishes'][$count]);
               }
               $count++;
           }

        $amount = $request->total_price;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Pippo',
                'lastName' => 'Baudo',
                'email' => 'pippoBaudo@pippoBaudo.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            return view('purchase-made');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An error occurred with the message: '.$result->message);
        }

}
}
