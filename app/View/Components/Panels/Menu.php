<?php

namespace App\View\Components\Panels;

use App\Contracts\Repositories\CategoryRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Menu extends Component
{
    public Collection $categoryTree;

    public string $categorySlug = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryRepositoryContract $category, Request $request)
    {
        $this->categoryTree = $category->categoriesToTree();
        if ($request->routeIs('products.category')) {
            $path = explode('/', $request->path());
            $this->categorySlug = $path[1];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.menu');
    }
}
