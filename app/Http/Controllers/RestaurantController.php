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
            'merchantId' => 'rn6zmvs8v98c9k5t',
            'publicKey' => '6xhdy4kpk8ktd3dt',
            'privateKey' => 'b0ea0391e8114daf7472b68caba9697e'
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
        $newOrder['notes'] = 'blabla';
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'rn6zmvs8v98c9k5t',
            'publicKey' => '6xhdy4kpk8ktd3dt',
            'privateKey' => 'b0ea0391e8114daf7472b68caba9697e'
        ]);
           $newOrder->save();


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

    //    script alternativo
        // $gateway = new \Braintree\Gateway([
        //     'environment' => 'sandbox',
        //     'merchantId' =>'rn6zmvs8v98c9k5t',
        //     'publicKey'=>'6xhdy4kpk8ktd3dt',
        //     'privateKey'=>'b0ea0391e8114daf7472b68caba9697e']);



    //  return view('checkout');

//    script alternativo
    // qui porto pagina di acquisto effettuato
    // public function store(){
    //     $gateway = new \Braintree\Gateway([
    //         'environment' => 'sandbox',
    //         'merchantId' =>'rn6zmvs8v98c9k5t',
    //         'publicKey'=>'6xhdy4kpk8ktd3dt',
    //         'privateKey'=>'b0ea0391e8114daf7472b68caba9697e']);

    //     return view('purchase-made');
    // }
}
