<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlePostRequest;
use App\Http\Requests\TagPostRequest;
use App\Models\Article;
use App\Models\Car;
use App\Services\TagsSynchronizer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function homepage(): View
    {
        $articles = Article::with('tags')->latest('published_at')->limit(3)->get();
        $products = Car::where('is_new', '1')->limit(4)->get();
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
        $cars = Car::with('carBody', 'carEngine', 'carClass')->get();
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
        $articles = Article::latest('published_at')->limit(3)->get();
        return view('pages.articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('pages.articles.create');
    }

    public function show(Article $article): View
    {
        return view('pages.articles.show', compact('article'));
    }

    public function store(ArticlePostRequest $request, TagPostRequest $tagRequest, TagsSynchronizer $tagsSynchronizer): RedirectResponse
    {
        $fields = $request->validated();
        $fields['published_at'] = $request->getPublishedAt();
        $article = Article::create($fields);

        $tags = $tagRequest->getTags();
        $tagsSynchronizer->sync($tags, $article);

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно создана');
    }

    public function edit(Article $article): View
    {
        return view('pages.articles.edit', compact('article'));
    }

    public function update(Article $article, ArticlePostRequest $request, TagPostRequest $tagRequest, TagsSynchronizer $tagsSynchronizer): RedirectResponse
    {
        $fields = $request->validated();
        $fields['published_at'] = $request->getPublishedAt();
        $article->update($fields);

        $tags = $tagRequest->getTags();
        $tagsSynchronizer->sync($tags, $article);

        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно изменена');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Новость успешно удалена');
    }
}
