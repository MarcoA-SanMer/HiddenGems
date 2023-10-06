<?php

namespace App\Http\Controllers;

use App\Models\vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $vendedores = Vendedor::all();
        return view('listadoVendedores',compact('vendedores'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearVendedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreC' => 'required',
            'nombreU' => 'required',
            'pass' => 'required',
            'marca' => 'required',
            'cal' => 'required'
        ]);

        $vendedor = new Vendedor;
        $vendedor->nombre_completo = $request->nombreC;
        $vendedor->nombre_usuario = $request->nombreU;
        $vendedor->contrasena = Hash::make($request->pass);
        $vendedor->nombre_marca = $request->marca;
        $vendedor->calificacion = $request->cal;

        $vendedor->save();
        return redirect()->route('Vendedor.create')->with('success', 'Vendedor creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vendedor = Vendedor::find($id);
        return view('verVendedor', compact('vendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vendedor = Vendedor::find($id);
        return view('editarVendedor', compact('vendedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreC' => 'required',
            'nombreU' => 'required',
            'pass' => 'required',
            'marca' => 'required',
            'cal' => 'required'
        ]);

        $vendedor = Vendedor::find($id);
        $vendedor->nombre_completo = $request->nombreC;
        $vendedor->nombre_usuario = $request->nombreU;
        $vendedor->contrasena = Hash::make($request->pass);
        $vendedor->nombre_marca = $request->marca;
        $vendedor->calificacion = $request->cal;

        $vendedor->save();

        return redirect()->route('Vendedor.index')->with('success', 'Vendedor actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vendedor = Vendedor::find($id);
        $vendedor->delete();

        return redirect()->route('Vendedor.index')->with('success', 'Vendedor eliminado exitosamente!');
    }
}
