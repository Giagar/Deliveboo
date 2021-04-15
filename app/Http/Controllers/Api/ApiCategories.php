<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiCategories extends Controller
{
    public function __invoke() {
        $categories = Category::all();
        return response()->json($categories);
    }
}
