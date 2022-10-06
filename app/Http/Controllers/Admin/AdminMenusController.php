<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Trademarks;
use Illuminate\Http\Request;

class AdminMenusController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['trademarks'] = Trademarks::all();
        $viewData['categories'] = Categories::all();
        $viewData['subcategories'] = Subcategories::all();

        return view('admin.menus.index')->with('viewData', $viewData);
    }

    public function storet(Request $request)
    {
        Trademarks::validate($request);

        $newProduct = new Trademarks();
        $newProduct->setTrademarks($request->input('trademarks'));
        $newProduct->save();

        return back();
    }

    public function storec(Request $request)
    {
        Categories::validate($request);

        $newProduct = new Categories();
        $newProduct->setCategories($request->input('categories'));
        $newProduct->save();

        return back();
    }

    public function stores(Request $request)
    {
        Subcategories::validate($request);

        $newProduct = new Subcategories();
        $newProduct->setSubcategories($request->input('subcategories'));
        $newProduct->save();

        return back();
    }

    public function editt($id)
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['trademarks'] = Trademarks::findOrFail($id);

        return view('admin.menus.editt')->with('viewData', $viewData);
    }

    public function editc($id)
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['categories'] = Categories::findOrFail($id);

        return view('admin.menus.editc')->with('viewData', $viewData);
    }

    public function edits($id)
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['subcategories'] = Subcategories::findOrFail($id);

        return view('admin.menus.edits')->with('viewData', $viewData);
    }

    public function updatet(Request $request, $id)
    {
        Trademarks::validate($request);

        $product = Trademarks::findOrFail($id);
        $product->setTrademarks($request->input('trademarks'));
        $product->save();

        return redirect()->route('admin.menus.index');
    }

    public function updatec(Request $request, $id)
    {
        Categories::validate($request);

        $product = Categories::findOrFail($id);
        $product->setCategories($request->input('categories'));
        $product->save();

        return redirect()->route('admin.menus.index');
    }

    public function updates(Request $request, $id)
    {
        Subcategories::validate($request);

        $product = Subcategories::findOrFail($id);
        $product->setSubcategories($request->input('subcategories'));
        $product->save();

        return redirect()->route('admin.menus.index');
    }

    public function deletet($id)
    {
        Trademarks::destroy($id);

        return back();
    }

    public function deletec($id)
    {
        Categories::destroy($id);

        return back();
    }

    public function deletes($id)
    {
        Subcategories::destroy($id);

        return back();
    }
}
