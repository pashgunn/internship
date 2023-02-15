<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlePostRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function homepage(): View
    {
        $articles = Article::latest('published_at')->limit(3)->get();
        return view('pages.homepage', compact('articles'));
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
        return view('pages.for-clients');
    }

    public function salons(): View
    {
        return view('pages.salons');
    }

    public function index(): View
    {
        $articles = Article::latest('published_at')->limit(3)->get();
        return view('pages.articles', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('pages.article.show', compact('article'));
    }

    public function create(): View
    {
        return view('pages.article.create');
    }

    public function store(ArticlePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Article::create([
            'slug' => Str::slug($validated['title']),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'body' => $validated['body'],
            'published_at' => $request->input('checkbox') ? $request->input('published_at') : null
        ]);

        return redirect()->route("articles")
            ->with('success', 'Новость успешно создана');
    }
}
