<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function categories(){
            $categories=Category::all();
            return response()->json($categories);
    }
    public function restaurants(){
        $restaurants=User::with('categories')->orderBy('rating','desc')->get();
        return response()->json($restaurants);
}

public function filteredRestaurants($name){
    $restaurants = User::with(['categories'])->whereHas('categories', function($query) use($name) {
        $query->where('name', $name);
    })->get();
    return response()->json($restaurants);
}
}
