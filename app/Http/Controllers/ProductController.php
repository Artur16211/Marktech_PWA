<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Trademarks;
use Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products'] = Product::all();
        $viewData['products_featured'] = Product::where('featured', '=', '1')->get();
        $viewData['products_new'] = Product::where('created_at')->first()->take(8)->orderBy('created_at', 'desc')->get();
        // most sales products
        $viewData['products_sales'] = Product::where('sales', '>', '0')->first()->take(8)->orderBy('sales', 'desc')->get();

        return view('product.index')->with('viewData', $viewData);
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

    public function accesorios()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_accesorios'] = Product::where('category', '=', 'Accesorios')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_accesorios'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_accesorios'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_accesorios'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_accesorios'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_accesorios'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Accesorios')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.accesorios')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardware()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_hardware'] = Product::where('category', '=', 'Hardware')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hardware'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hardware'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hardware'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hardware'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hardware'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Hardware')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware')->withQuery($barra)->with('viewData', $viewData);
    }

    public function computadoras()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_computadoras'] = Product::where('category', '=', 'Computadoras')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_computadoras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_computadoras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_computadoras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_computadoras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_computadoras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.computadoras')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronica()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_electronica'] = Product::where('category', '=', 'Electronica')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_electronica'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_electronica'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_electronica'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_electronica'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_electronica'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('category', '=', 'Electronica')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica')->withQuery($barra)->with('viewData', $viewData);
    }

    public function bannermac()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['banner_mac'] = Product::where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_mac'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_mac'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_mac'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_mac'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_mac'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Apple')->where('category', '=', 'Computadoras')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.banner.mac')->withQuery($barra)->with('viewData', $viewData);
    }

    public function bannernvidia()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['banner_nvidia'] = Product::where('trademark', '=', 'Nvidia')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.banner.nvidia')->withQuery($barra)->with('viewData', $viewData);
    }

    public function banneradata()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['banner_adata'] = Product::where('trademark', '=', 'Adata')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_adata'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_adata'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_adata'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_adata'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_adata'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Adata')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.banner.adata')->withQuery($barra)->with('viewData', $viewData);
    }

    public function bannertoshiba()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['banner_toshiba'] = Product::where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_toshiba'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_toshiba'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_toshiba'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_toshiba'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_toshiba'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Toshiba')->where('subcategory', '=', 'Discos Duros')->orwhere('trademark', '=', 'Toshiba')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.banner.toshiba')->withQuery($barra)->with('viewData', $viewData);
    }

    public function bannerlg()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['banner_lg'] = Product::where('trademark', '=', 'LG')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_lg'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_lg'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_lg'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_lg'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['banner_lg'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'LG')->where('subcategory', '=', 'Monitores')->orwhere('trademark', '=', 'LG')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.banner.lg')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwareprocesadores()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_procesadores'] = Product::where('subcategory', '=', 'Procesadores')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_procesadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_procesadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_procesadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_procesadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_procesadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Procesadores')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_procesadores')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwaremotherboard()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_motherboard'] = Product::where('subcategory', '=', 'Targetas Madre')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_motherboard'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_motherboard'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_motherboard'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_motherboard'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_motherboard'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas Madre')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_motherboard')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwareram()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_ram'] = Product::where('subcategory', '=', 'Memorias RAM')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ram'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ram'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ram'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ram'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ram'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Memorias RAM')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_ram')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwaressd()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_ssd'] = Product::where('subcategory', '=', 'SSD')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ssd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ssd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ssd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ssd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_ssd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'SSD')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_ssd')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwaregpu()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_gpu'] = Product::where('subcategory', '=', 'Targetas de Video')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gpu'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gpu'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gpu'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gpu'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gpu'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Targetas de Video')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_gpu')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwaredisipadores()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_disipadores'] = Product::where('subcategory', '=', 'Disipadores')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_disipadores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_disipadores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_disipadores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_disipadores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_disipadores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Disipadores')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_disipadores')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwaregabinetes()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_gabinetes'] = Product::where('subcategory', '=', 'Gabinetes')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gabinetes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gabinetes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gabinetes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gabinetes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_gabinetes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Gabinetes')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_gabinetes')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwarehdd()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_hdd'] = Product::where('subcategory', '=', 'Discos Duros')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hdd'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hdd'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hdd'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hdd'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_hdd'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Discos Duros')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_hdd')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwareusb()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_usb'] = Product::where('subcategory', '=', 'USB/SD')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_usb'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_usb'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_usb'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_usb'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_usb'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'USB/SD')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_usb')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hardwarefuentes()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_fuentes'] = Product::where('subcategory', '=', 'Fuentes de Poder')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_fuentes'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_fuentes'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_fuentes'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_fuentes'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_fuentes'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Fuentes de Poder')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.hardware.hardware_fuentes')->withQuery($barra)->with('viewData', $viewData);
    }

    public function accesoriosmouse()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_mouse'] = Product::where('subcategory', '=', 'Mouse')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_mouse'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_mouse'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_mouse'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_mouse'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_mouse'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Mouse')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.accesorios.accesorios_mouse')->withQuery($barra)->with('viewData', $viewData);
    }

    public function accesoriosteclados()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_teclados'] = Product::where('subcategory', '=', 'Teclados')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_teclados'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_teclados'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_teclados'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_teclados'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_teclados'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teclados')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.accesorios.accesorios_teclados')->withQuery($barra)->with('viewData', $viewData);
    }

    public function accesoriosaudifonos()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_audifonos'] = Product::where('subcategory', '=', 'Audifonos')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_audifonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_audifonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_audifonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_audifonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_audifonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Audifonos')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.accesorios.accesorios_audifonos')->withQuery($barra)->with('viewData', $viewData);
    }

    public function accesoriosalfombrillas()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_alfombrillas'] = Product::where('subcategory', '=', 'Alfombrillas')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_alfombrillas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_alfombrillas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_alfombrillas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_alfombrillas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Alfombrillas')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.accesorios.accesorios_alfombrillas')->withQuery($barra)->with('viewData', $viewData);
    }

    public function computadoraslaptop()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_laptop'] = Product::where('subcategory', '=', 'Laptop')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_laptop'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_laptop'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_laptop'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_laptop'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_laptop'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Laptop')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.computadoras.computadoras_laptop')->withQuery($barra)->with('viewData', $viewData);
    }

    public function computadorasescritorio()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_escritorio'] = Product::where('subcategory', '=', 'Escritorio')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_escritorio'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_escritorio'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_escritorio'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_escritorio'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_escritorio'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Escritorio')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.computadoras.computadoras_escritorio')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronicaconsolas()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_consolas'] = Product::where('subcategory', '=', 'Consolas')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_consolas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_consolas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_consolas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_consolas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_consolas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Consolas')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica.electronica_consolas')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronicatv()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_tv'] = Product::where('subcategory', '=', 'Televisores')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_tv'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_tv'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_tv'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_tv'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_tv'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Televisores')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica.electronica_tv')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronicamonitores()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_monitores'] = Product::where('subcategory', '=', 'Monitores')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_monitores'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_monitores'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_monitores'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_monitores'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_monitores'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Monitores')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica.electronica_monitores')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronicabocinas()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_bocinas'] = Product::where('subcategory', '=', 'Bocinas')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_bocinas'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_bocinas'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_bocinas'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_bocinas'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_bocinas'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Bocinas')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica.electronica_bocinas')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronicacamaras()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_camaras'] = Product::where('subcategory', '=', 'Cámaras')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_camaras'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_camaras'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_camaras'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_camaras'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_camaras'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Cámaras')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica.electronica_camaras')->withQuery($barra)->with('viewData', $viewData);
    }

    public function electronicatelefonos()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['products_telefonos'] = Product::where('subcategory', '=', 'Teléfonos')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_telefonos'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_telefonos'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_telefonos'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_telefonos'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['products_telefonos'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('subcategory', '=', 'Teléfonos')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.categories.electronica.electronica_telefonos')->withQuery($barra)->with('viewData', $viewData);
    }

    //trademark

    public function nvidia()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['trademark_nvidia'] = Product::where('trademark', '=', 'Nvidia')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_nvidia'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_nvidia'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_nvidia'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_nvidia'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Nvidia')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.trademarks.nvidia')->withQuery($barra)->with('viewData', $viewData);
    }

    public function dell()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['trademark_dell'] = Product::where('trademark', '=', 'DELL')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_dell'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_dell'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_dell'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_dell'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_dell'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'DELL')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.trademarks.dell')->withQuery($barra)->with('viewData', $viewData);
    }

    public function gigabyte()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['trademark_gigabyte'] = Product::where('trademark', '=', 'Gigabyte')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_gigabyte'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_gigabyte'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_gigabyte'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_gigabyte'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'Gigabyte')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.trademarks.gigabyte')->withQuery($barra)->with('viewData', $viewData);
    }

    public function hp()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');
        $viewData['title'] = 'Marktech';
        $viewData['subtitle'] = 'Productos';

        $viewData['trademark_hp'] = Product::where('trademark', '=', 'HP')->paginate(12);

        $trademark = Request::get('trademark');

        if ($trademark == null) {
            $trademark = 'all';
        } else {
            $trademark = Request::get('trademark');
        }

        $price = Request::get('price');

        if ($price == null) {
            $price = 'all';
        } else {
            $price = Request::get('price');
        }

        $sort = Request::get('sort');

        if ($sort == null) {
            $sort = 'name';
        } else {
            $sort = Request::get('sort');
        }

        switch ($sort) {
            case 'name':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_hp'] = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_hp'] = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_hp'] = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_hp'] = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($price) {
                    // trademark && price
                    case $price != 'all' && $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price != 'all' && $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $price = 'all':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                    case $price == 'all':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;

                    // case all && $price
                    case $price == '1000-2000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $price == '2000-3000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $price == '3000-4000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $price == '4000-5000':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $price == '5000-...':
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $viewData['trademark_hp'] = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', 'HP')->paginate(12);
                        break;
                }
                break;
        }

        return view('product.trademarks.hp')->withQuery($barra)->with('viewData', $viewData);
    }
}
