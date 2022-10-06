<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminItemsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['products'] = Item::all()->sortByDesc('id');

        return view('admin.item.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Item::validate($request);

        $newProduct = new Item();
        $newProduct->setQuantity($request->input('quantity'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setOrderId($request->input('order_id'));
        $newProduct->setProductId($request->input('product_id'));
        $newProduct->save();

        // if ($request->hasFile('image')) {
        //     $imageName = $newProduct->getId() . "." . $request->file('image')->extension();
        //     Storage::disk('public')->put(
        //         $imageName,
        //         file_get_contents($request->file('image')->getRealPath())
        //     );
        //     $newProduct->setImage($imageName);
        //     $newProduct->save();
        // }

        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';
        $viewData['product'] = Item::findOrFail($id);
        // return view('admin.item.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Item::validate($request);

        $Item = Item::findOrFail($id);
        $Item->setQuantity($request->input('quantity'));
        $Item->setPrice($request->input('price'));
        $Item->setOrderId($request->input('order_id'));
        $Item->setProductId($request->input('product_id'));

        // if ($request->hasFile('image')) {
        //     $imageName = $product->getId() . "." . $request->file('image')->extension();
        //     Storage::disk('public')->put(
        //         $imageName,
        //         file_get_contents($request->file('image')->getRealPath())
        //     );
        //     $product->setImage($imageName);
        // }

        $Item->save();

        return redirect()->route('admin.item.index');
    }

    public function delete($id)
    {
        Item::destroy($id);

        return back();
    }
}
