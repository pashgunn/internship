<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarRepositoryContract;
use App\Contracts\Repositories\CategoryRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProductsController extends Controller
{
    public function __construct(
        private readonly CarRepositoryContract $carRepository,
        private readonly CategoryRepositoryContract $categoryRepository
    ) {
    }

    public function index(Request $request): View
    {
        $pagination = $this->carRepository->getCarCatalog($request->input('page') ?? 1, 16);
        $products = $pagination->items();
        return view('pages.products.index', compact('products', 'pagination'));
    }

    public function show(int $id): View
    {
        $product = $this->carRepository->find($id);
        return view('pages.products.show', compact('product'));
    }

    public function category(string $id, Request $request): View
    {
        $categoriesId = $this->categoryRepository->getCategoriesTreeId($id);
        $pagination = $this->carRepository->catalogWithCategory($request->input('page') ?? 1, $categoriesId, 16);
        $products = $pagination->items();
        return view('pages.products.index', compact('products', 'pagination', 'id'));
    }
}
