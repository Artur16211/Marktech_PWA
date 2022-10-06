<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAddressController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Marktech - Administrador';

        $viewData['products'] = Address::all();

        return view('admin.address.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Address::validate($request);

        $newProduct = new Address();
        $newProduct->setUserId($request->input('user_id'));
        $newProduct->setNombre($request->input('nombre'));
        $newProduct->setPostal($request->input('postal'));
        $newProduct->setEstado($request->input('estado'));
        $newProduct->setMunicipio($request->input('municipio'));
        $newProduct->setColonia($request->input('colonia'));
        $newProduct->setCalle($request->input('calle'));
        $newProduct->setExterior($request->input('exterior'));
        $newProduct->setInterior($request->input('interior'));
        $newProduct->setCalle1($request->input('calle1'));
        $newProduct->setCalle2($request->input('calle2'));
        $newProduct->setTipo($request->input('tipo'));
        $newProduct->setTelefono($request->input('telefono'));
        $newProduct->setExtra($request->input('extra'));
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
        $viewData['product'] = Address::findOrFail($id);

        return view('admin.address.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Address::validate($request);

        $Address = Address::findOrFail($id);
        $Address->setUserId($request->input('user_id'));
        $Address->setNombre($request->input('nombre'));
        $Address->setPostal($request->input('postal'));
        $Address->setEstado($request->input('estado'));
        $Address->setMunicipio($request->input('municipio'));
        $Address->setColonia($request->input('colonia'));
        $Address->setCalle($request->input('calle'));
        $Address->setExterior($request->input('exterior'));
        $Address->setInterior($request->input('interior'));
        $Address->setCalle1($request->input('calle1'));
        $Address->setCalle2($request->input('calle2'));
        $Address->setTipo($request->input('tipo'));
        $Address->setTelefono($request->input('telefono'));
        $Address->setExtra($request->input('extra'));

        // if ($request->hasFile('image')) {
        //     $imageName = $product->getId() . "." . $request->file('image')->extension();
        //     Storage::disk('public')->put(
        //         $imageName,
        //         file_get_contents($request->file('image')->getRealPath())
        //     );
        //     $product->setImage($imageName);
        // }

        $Address->save();

        return redirect()->route('admin.address.index');
    }

    public function delete($id)
    {
        Address::destroy($id);

        return back();
    }
}
