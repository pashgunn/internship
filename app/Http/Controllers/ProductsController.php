<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarRepositoryContract;
use App\Contracts\Repositories\CategoryRepositoryContract;
use App\Models\Category;

class ProductsController extends Controller
{
    public function __construct(
        private readonly CarRepositoryContract $carRepository,
        private readonly CategoryRepositoryContract $categoryRepository
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

    public function category($id)
    {
        $categories = $this->categoryRepository->getCategory($id);
        $pagination = $this->carRepository->catalogWithCategory($categories,16);
        $products = $pagination->items();
        return view('pages.products.index', compact('products', 'pagination', 'id'));
    }
}
