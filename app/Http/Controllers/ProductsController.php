<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarRepositoryContract;

class ProductsController extends Controller
{
    public function __construct(
        private readonly CarRepositoryContract $carRepository,
    ) {
    }

    public function index()
    {
        $pagination = $this->carRepository->getCatalog( 16);
        $products = $pagination->items();
        return view('pages.products.index', compact('products', 'pagination'));
    }

    public function show($id)
    {
        $product = $this->carRepository->find($id);
        return view('pages.products.show', compact('product'));
    }
}
