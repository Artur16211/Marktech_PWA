<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Subcategories;
use App\Models\Trademarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['products'] = Product::all();
        $viewData['trademarks'] = Trademarks::all();
        $viewData['categories'] = Categories::all();
        $viewData['subcategories'] = Subcategories::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setDiscountedprice($request->input('discounted_price'));
        $newProduct->setCategory($request->input('category'));
        $newProduct->setSubcategory($request->input('subcategory'));
        $newProduct->setFeatured($request->input('featured'));
        $newProduct->setImage($request->file('image'));
        $newProduct->setTrademark($request->input('trademark'));
        $newProduct->setStock($request->input('stock'));
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';
        $viewData['product'] = Product::findOrFail($id);
        $viewData['trademarks'] = Trademarks::all();
        $viewData['categories'] = Categories::all();
        $viewData['subcategories'] = Subcategories::all();

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setDiscountedprice($request->input('discounted_price'));
        $product->setCategory($request->input('category'));
        $product->setSubcategory($request->input('subcategory'));
        $product->setFeatured($request->input('featured'));
        $product->setTrademark($request->input('trademark'));
        $product->setStock($request->input('stock'));

        if ($request->hasFile('image')) {
            $imageName = $product->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }

        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        Product::destroy($id);

        return back();
    }
}
