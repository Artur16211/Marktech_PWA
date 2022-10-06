<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index()
    {
        $userId = Auth::user()->getId();

        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['products'] = Address::latest()->where('user_id', '=', $userId)->get();

        return view('myaccount.myaddress')->with('viewData', $viewData);
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Marktech';
        $viewData['product'] = Address::findByHashidOrFail($id);

        return view('myaccount.myaddress.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        // Address::validate($request);

        $Address = Address::findOrFail($id);
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

        $Address->save();

        return redirect()->route('myaccount.myaddress');
    }

    public function delete($id)
    {
        Address::destroy($id);

        return back();
    }
}
