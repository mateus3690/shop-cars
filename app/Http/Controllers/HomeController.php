<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all()->where('published', 1);

        $listData = [
            'products' => $products,
        ];

        return Inertia::render('Home', $listData);
    }

}
