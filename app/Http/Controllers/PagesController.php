<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

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

    public function articles(): View
    {
        $articles = Article::latest('published_at')->limit(3)->get();
        return view('pages.articles', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('pages.article.show', compact('article'));
    }
}
