<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
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
}
