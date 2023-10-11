<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compradors = Comprador::all();
        return view('crearComprador',compact('compradors'));
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
            'nombreus' => 'required|unique:compradors,Nombre_usuario', // Añade la regla unique para el nombre de usuario en la tabla 'compradores'
            'contrasena' => 'required',
        ], [
            'nombreco.required' => 'El campo Nombre Completo es obligatorio.',
            'nombreus.required' => 'El campo Nombre de Usuario es obligatorio.',
            'nombreus.unique' => 'El nombre de usuario ya está registrado.', // Mensaje de error para nombre de usuario duplicado
            'contrasena.required' => 'El campo Contraseña es obligatorio.',
        ]);
    
        $comprador = new Comprador;
    
        $comprador->Nombre_completo = $request->nombreco;
        $comprador->Nombre_usuario = $request->nombreus;
        $comprador->Contrasena = Hash::make($request->contrasena);
    
        $comprador->save();
    
        return redirect()->route('Comprador.index')->with('success', 'Comprador creado exitosamente!');
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
                'nombreus' => 'required|unique:compradors,Nombre_usuario,' . $id . ',Id_comprador', // Añade el campo de identificación
            ], [
                'nombreco.required' => 'El campo Nombre Completo es obligatorio.',
                'nombreus.required' => 'El campo Nombre de Usuario es obligatorio.',
                'nombreus.unique' => 'El nombre de usuario ya está registrado.', // Mensaje de error para nombre de usuario duplicado
            ]);

            $comprador = Comprador::find($id);

            $comprador->Nombre_completo = $request->nombreco;
            $comprador->Nombre_usuario = $request->nombreus;

            // Verifica si se proporcionó una nueva contraseña
            if ($request->has('contrasena') && !empty($request->contrasena)) {
                $comprador->Contrasena = Hash::make($request->contrasena);
            }

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
