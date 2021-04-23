<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }
    public function statistics(){
        // qui usero javascript quindi passo un json??o cosi o monto chiamata api nello script js
        // di chart?

        $owner_id=Auth::id();
        $orders = json_encode(Order::with(['dishes'])->whereHas('dishes', function($query) use($owner_id) {
            $query->where('user_id', $owner_id);
        })->get());
        // dd(gettype($orders));
        return view('user.statistics',compact('orders'));
    }
    public function orders(){
        // soluzione a,restituisco i piatti e nella vista risalgo agli ordini col metodo ->orders()
        // $dishes = Dish::where('user_id', Auth::id())->get();

        // soluzine b, restituisco direttamente gli ordini facendo filtro per i piatti solo del ristoratore
        // in questione
        $owner_id=Auth::id();
        $orders = Order::with(['dishes'])->whereHas('dishes', function($query) use($owner_id) {
            $query->where('user_id', $owner_id);
        })->get();
        $processedOrders = [];
        foreach ($orders as $order){
            $processedOrders[$order->id]["info"] = $order;
            $processedOrders[$order->id]["grandTotal"] = 0;
            $dishes = $order->dishes()->get()->toArray();

            // piatti aggregati per quantità e prezzo per unità
            /*
            ["nome_piatto" => ["quantita" => 2, "prezzo_unita" => 10 "subtotale" => 20]];


            */

            $result = array_reduce($dishes, function($acc,$dish){
                if(!array_key_exists($dish['name'],$acc)) {
                    $acc[$dish['name']] = ["quantita" => 1, "subtotale" => $dish['price']];
                } else {
                    $acc[$dish['name']]["quantita"] += 1;
                    $acc[$dish['name']]["subtotale"] += $dish['price'];
                    }

                    return $acc;

            },[]);
            $processedOrders[$order->id]["items"] = $result;
            $processedOrders[$order->id]["grandTotal"] = collect($order->dishes)->sum('price');
        }
        // dd($processedOrders);

//  versione vecchia
//    $dishPrices=[];
// foreach ($orders as $order){
// foreach ($order->dishes()->get()->unique()->toArray() as $dish) {
// $dishesforOrder= (array_count_values(array_map(function($item) {
//     return $item['name'] ;
// }, $order->dishes()->get()->toArray())));
// $dishPrices[]=$dish['price'];
// }
// foreach ($dishesforOrder as $dishName=>$dishQuantity){
//     echo $dishName . $dishQuantity;
// }
// }

        // questa pagina che ritorno la gestiremo con blade
        return view('user.orders',compact('processedOrders'));
    }
}
