<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
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
        return view('user.statistics',compact('dishes'));
    }
    public function orders(){
        $dishes = Dish::where('user_id', Auth::id())->get();
        // questa pagina la gestiremo con blade
        return view('user.orders',compact('dishes'));
    }
}
