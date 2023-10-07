<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use Illuminate\Http\Request;

class CompradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compradors = Comprador::all();
        return view('listadoComprador',compact('compradors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearComprador');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreco' => 'required',
            'nombreus' => 'required',
            'contrasena' => 'required',
        ]);
    
        $comprador = new Comprador;
    
        $comprador->Nombre_completo = $request->nombreco;
        $comprador->Nombre_usuario = $request->nombreus;
        $comprador->Contrasena = $request->contrasena;
    
        $comprador->save();
    
        return redirect()->route('Comprador.create')->with('success', 'Comprador creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comprador = Comprador::find($id);
        return view('verComprador', compact('comprador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comprador = Comprador::find($id);
        return view('editarComprador', compact('comprador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreco' => 'required',
            'nombreus' => 'required',
            'contrasena' => '',
        ]);
    
        $comprador = Comprador::find($id);
    
        $comprador->Nombre_completo = $request->nombreco;
        $comprador->Nombre_usuario = $request->nombreus;
        $comprador->Contrasena = $request->contrasena;
    
        $comprador->save();
    
        return redirect()->route('Comprador.index')->with('success', 'Comprador actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comprador = Comprador::find($id);
        $comprador->delete();

        return redirect()->route('Comprador.index')->with('success', 'Comprador eliminado exitosamente!');
    }
}
