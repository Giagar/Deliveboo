<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ApiRestaurants extends Controller
{
    public function __invoke() {
        $restaurants = User::all();
        return response()->json($restaurants);
    }
}
