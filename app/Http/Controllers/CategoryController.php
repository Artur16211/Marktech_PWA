<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products'] = Product::where('category', '=', 'Consolas')->get();

        return view('categories.consoles')->with('viewData', $viewData);
    }

    public function show($id)
    {
        $viewData = [];

        $product = Product::findOrFail($id);

        $viewData['title'] = $product->getName().'- Marktech';
        $viewData['subtitle'] = $product->getName().'- Productos';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }
}
