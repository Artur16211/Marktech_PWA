<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        return view('admin.home.index')->with('viewData', $viewData);
    }
}
