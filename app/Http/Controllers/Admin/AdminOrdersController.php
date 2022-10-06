<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['products'] = Order::all()->sortByDesc('id');
        $viewData['pagados'] = Order::where('paid', '=', 'Pagado')->get()->sortByDesc('id');
        $viewData['cancelado'] = Order::where('paid', '=', 'Cancelado')->get()->sortByDesc('id');
        $viewData['pendiente'] = Order::where('paid', '=', 'No Pagado')->get()->sortByDesc('id');

        return view('admin.order.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Order::validate($request);

        $newProduct = new Order();
        $newProduct->setTotal($request->input('total'));
        $newProduct->setUserId($request->input('user_id'));
        $newProduct->setState($request->input('paid'));
        $newProduct->setAddress($request->input('address'));
        $newProduct->setEstado($request->input('status'));
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
        $viewData['product'] = Order::findOrFail($id);

        return view('admin.order.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Order::validate($request);

        $Order = Order::findOrFail($id);
        $Order->setTotal($request->input('total'));
        $Order->setUserId($request->input('user_id'));
        $Order->setState($request->input('paid'));
        $Order->setAddress($request->input('address'));
        $Order->setEstado($request->input('status'));

        // if ($request->hasFile('image')) {
        //     $imageName = $product->getId() . "." . $request->file('image')->extension();
        //     Storage::disk('public')->put(
        //         $imageName,
        //         file_get_contents($request->file('image')->getRealPath())
        //     );
        //     $product->setImage($imageName);
        // }

        $Order->save();

        return redirect()->route('admin.order.index');
    }

    public function delete($id)
    {
        Order::destroy($id);

        return back();
    }
}
