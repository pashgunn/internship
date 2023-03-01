<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticleRepositoryContract;
use App\Contracts\Repositories\CarRepositoryContract;
use App\Contracts\Repositories\TagsSynchronizerContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct(
        private readonly ArticleRepositoryContract $articleRepository,
        private readonly CarRepositoryContract     $carRepository,
        private readonly TagsSynchronizerContract  $tagsSynchronizer,
    ) {
    }

    public function homepage(): View
    {
        $articles = $this->articleRepository->homepageArticles();
        $products = $this->carRepository->homepageCars();
        return view('pages.homepage', compact('articles', 'products'));
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

    public function index(): View
    {
        $pagination = $this->articleRepository->getCatalog( 5);
        $articles = $pagination->items();
        return view('pages.articles.index', compact('articles', 'pagination'));
    }

    public function create(): View
    {
        return view('pages.articles.create');
    }

    public function show($article): View
    {
        $article = $this->articleRepository->find($article);
        return view('pages.articles.show', compact('article'));
    }

    public function store(ArticleRequest $request, TagRequest $tagRequest): RedirectResponse
    {
        $fields = $request->validated();
        $fields['published_at'] = $request->getPublishedAt();
        $article = $this->articleRepository->create($fields);

        $tags = $tagRequest->getTags();

        $this->tagsSynchronizer->sync($tags, $this->articleRepository->find($article));

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно создана');
    }

    public function edit($article): View
    {
        $article = $this->articleRepository->find($article);
        return view('pages.articles.edit', compact('article'));
    }

    public function update($article, ArticleRequest $request, TagRequest $tagRequest): RedirectResponse
    {
        $fields = $request->validated();
        $fields['published_at'] = $request->getPublishedAt();
        $this->articleRepository->update($fields);

        $tags = $tagRequest->getTags();
        $this->tagsSynchronizer->sync($tags, $this->articleRepository->find($article));

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно изменена');
    }

    public function destroy($article): RedirectResponse
    {
        $this->articleRepository->delete($article);
        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно удалена');
    }
}
