<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\BannerRepositoryContract;
use App\Contracts\Repositories\CarRepositoryContract;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly CarRepositoryContract     $carRepository,
        private readonly BannerRepositoryContract $bannerRepository
    ) {
    }

    public function homepage(): View
    {
        $articles = $this->articleRepository->homepageArticles(3);
        $products = $this->carRepository->homepageCars(4);
        $banners = $this->bannerRepository->getRandomBanners();
        return view('pages.homepage', compact('articles', 'products', 'banners'));
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function contacts(): View
    {
        return view('pages.contacts');
    }

    public function salesTerms(): View
    {
        return view('pages.sales-terms');
    }

    public function financeDepartment(): View
    {
        return view('pages.finance-department');
    }

    public function forClients(): View
    {
        $cars = $this->carRepository->forClients();
        $avgPrice = $cars->avg('price');
        $avgDiscountPrice = $cars->whereNotNull('old_price')->avg('price');
        $mostExpensiveModel = $cars->where('price', $cars->max('price'))->toArray();
        $carSalons = $cars->pluck('salon')->unique()->values()->toArray();
        $carEngines = $cars->pluck('carEngine')->pluck('name')->unique()->values()->sort()->toArray();

        $carClasses = $cars->pluck('carClass')->unique('name')->map(function ($item) {
            return [Str::slug($item->name), $item->name];
        })->sort()->toAssoc()->toArray();

        $carsCollection = $cars->whereNotNull('old_price')->filter(function ($item) {
            return (Str::contains($item->name, ['5', '6']) || Str::contains($item->kpp, ['5', '6']) || Str::contains($item->carBody?->name, ['5', '6']));
        })->toArray();

        $carBodies = $cars->whereNotNull('carBody')->groupBy('car_body_id')->map(function ($item) {
            return [$item->first()->carBody->name, $item->avg('price')];
        })->toAssoc()->sort()->toArray();

        return view('pages.for-clients', compact('cars', 'avgPrice', 'avgDiscountPrice', 'mostExpensiveModel', 'carSalons', 'carEngines', 'carClasses', 'carsCollection', 'carBodies'));
    }

    public function salons(): View
    {
        return view('pages.salons');
    }
}
