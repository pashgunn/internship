<?php

namespace App\Http\Controllers;

use App\Models\Car;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Car::get();
        return view('pages.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Car::find($id);
        return view('pages.products.show', compact('product'));
    }
}
