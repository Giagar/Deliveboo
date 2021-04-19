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
        // questa pagina che ritorno la gestiremo con blade
        return view('user.orders',compact('orders'));
    }
}
