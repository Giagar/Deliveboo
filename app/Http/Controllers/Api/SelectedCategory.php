<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SelectedCategory extends Controller
{
    public function __invoke($name) {
        $restaurants = User::with(['categories'])->whereHas('categories', function($query)
        use($name) {
            $query->where('name', $name);
        })->get();

        return response()->json($restaurants);
    }
}
