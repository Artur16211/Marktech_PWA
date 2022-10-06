<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Trademarks;
use Request;

class SearchController extends Controller
{
    public static function search()
    {
        $viewData = [];
        $viewData['trademarks'] = Trademarks::all();

        $barra = Request::get('barra');

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

        $product = Product::where('name', 'LIKE', '%'.$barra.'%')->paginate(15);

        switch ($sort) {
            case 'name':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->where('price', '>', 5000)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;
                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $product = Product::orderby('name')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;
                }
                break;
            case 'price_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $product = Product::orderby('price')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;
                }
                break;
            case 'price_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $product = Product::orderbyDesc('price')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;
                }
                break;
            case 'trademark_desc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $product = Product::orderbyDesc('trademark')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;
                }
                break;
            case 'trademark_asc':
                switch ($trademark) {
                    // trademark && price
                    case $trademark != 'all' && $price != 'all' && $price == '1000-2000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '2000-3000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '3000-4000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '4000-5000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case $trademark != 'all' && $price != 'all' && $price == '5000-...':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    // base
                    case $trademark != 'all' && $price = 'all':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('trademark', '=', $trademark)->paginate(12);
                        break;
                    case 'all' && $price == 'all':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;

                    // case all && $price
                    case 'all' && $price == '1000-2000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 1000)->where('price', '<', 2000)->paginate(12);
                        break;
                    case 'all' && $price == '2000-3000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 2000)->where('price', '<', 3000)->paginate(12);
                        break;
                    case 'all' && $price == '3000-4000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 3000)->where('price', '<', 4000)->paginate(12);
                        break;
                    case 'all' && $price == '4000-5000':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 4000)->where('price', '<', 5000)->paginate(12);
                        break;
                    case 'all' && $price == '5000-...':
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->where('price', '>', 5000)->paginate(12);
                        break;
                    default:
                        $product = Product::orderby('trademark')->where('name', 'LIKE', '%'.$barra.'%')->paginate(12);
                        break;
                }
                break;
        }

        // If there are no results, return a message.
        if (count($product) > 0) {
            return view('search.search')->withDetails($product)->withQuery($barra)->with('viewData', $viewData);
        } else {
            return view('search.nofound')->withMessage('No se encontraron resultados para la busqueda')->with('viewData', $viewData);
        }
    }
}
