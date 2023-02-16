<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlePostRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
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

    public function create(): View
    {
        return view('pages.article.create');
    }

    public function show(Article $article): View
    {
        return view('pages.article.show', compact('article'));
    }

    public function store(ArticlePostRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $fields['published_at'] = $request->getPublishedAt();
        Article::create($fields);

        return redirect()->route("articles")
            ->with('success', 'Новость успешно создана');
    }

    public function edit(Article $article): View
    {
        return view('pages.article.edit', compact('article'));
    }

    public function update(Article $article, ArticlePostRequest $request): RedirectResponse
    {
        $fields = $request->validated();
        $fields['slug'] = Str::slug($fields['title']);
        $fields['published_at'] = $request->getPublishedAt();
        try {
            $article->update($fields);
        } catch (QueryException $exception) {
            return back()->withErrors('Новость с таким slug уже есть');
        }


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
