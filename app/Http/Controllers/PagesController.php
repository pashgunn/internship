<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PagesController extends Controller
{
    public function homepage()
    {
        $articles = Article::latest('published_at')->limit(3)->get();
        return view('pages.homepage', compact('articles'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function salesTerms()
    {
        return view('pages.sales-terms');
    }

    public function financeDepartment()
    {
        return view('pages.finance-department');
    }

    public function forClients()
    {
        return view('pages.for-clients');
    }

    public function salons()
    {
        return view('pages.salons');
    }

    public function articles()
    {
        $articles = Article::latest('published_at')->limit(3)->get();
        return view('pages.articles', compact('articles'));
    }
}
