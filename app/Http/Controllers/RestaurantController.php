<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show($name){
  $restaurant= User::where('restaurant_name',$name)->get()->first();
//   dd($restaurant);
return view('public-menu',compact('restaurant'));
    }
}
