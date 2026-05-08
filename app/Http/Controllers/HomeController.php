<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->take(8)->get();
        $categories = Category::all();

        return view('user.home', compact('products', 'categories'));
    }
}
