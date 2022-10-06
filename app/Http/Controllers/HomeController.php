<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech';

        return view('home.index')->with('viewData', $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = '';
        $viewData['description'] = '';
        $viewData['author'] = '';

        return view('home.about')->with('viewData', $viewData);
    }
}
