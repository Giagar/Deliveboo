<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }
    public function statistics(){
        // qui usero javascript quindi passo un json
        $orders = json_encode(Auth::user()->orders);
        dd($orders);
        return view('user.statistics',compact('orders'));
    }
    public function orders(){
        // questa pagina la gestiremo con blade
        $orders = Auth::user()->orders;
        dd($orders);
        return view('user.orders',compact('orders'));
    }
}
