<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUsersController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['products'] = User::all();

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        User::validate($request);

        $newProduct = new User();
        $newProduct->setName($request->input('name'));
        $newProduct->setEmail($request->input('email'));
        $newProduct->setPassword($request->input('password'));
        $newProduct->setRole($request->input('role'));
        $newProduct->setBalance($request->input('balance'));
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
        $viewData['product'] = User::findOrFail($id);

        return view('admin.user.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        User::validate($request);

        $User = User::findOrFail($id);
        $User->setName($request->input('name'));
        $User->setEmail($request->input('email'));
        $User->setPassword($request->input('password'));
        $User->setRole($request->input('role'));
        // $User->setBalance($request=0);

        // if ($request->hasFile('image')) {
        //     $imageName = $product->getId() . "." . $request->file('image')->extension();
        //     Storage::disk('public')->put(
        //         $imageName,
        //         file_get_contents($request->file('image')->getRealPath())
        //     );
        //     $product->setImage($imageName);
        // }

        $User->save();

        return redirect()->route('admin.user.index');
    }

    public function delete($id)
    {
        User::destroy($id);

        return back();
    }
}
