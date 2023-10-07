<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('listadoProductos',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'precio.required' => 'El campo Precio es obligatorio.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'categoria.required' => 'El campo Categoría es obligatorio.',
        ]);

        $producto = new Producto;

        $producto->Nombre = $request->nombre;
        $producto->Precio = $request->precio;
        $producto->Descripción = $request->descripcion;
        $producto->Categoria = $request->categoria;

        if ($producto->save()) {
            // La operación de guardado fue exitosa, redirigir a Producto.index
            return redirect()->route('Producto.index')->with('success', 'Producto creado exitosamente!');
        } else {
            // La operación de guardado falló, redirigir a Producto.create
            return redirect()->route('Producto.create')->withInput()->withErrors('Ha ocurrido un error en la operación.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('verProducto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('editarProducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'precio.required' => 'El campo Precio es obligatorio.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'categoria.required' => 'El campo Categoría es obligatorio.',
        ]);
    
        $producto = Producto::find($id);
        $producto->Nombre = $request->nombre;
        $producto->Precio = $request->precio;
        $producto->Descripción = $request->descripcion;
        $producto->Categoria = $request->categoria;
        $producto->save();
    
        return redirect()->route('Producto.index')->with('success', 'Producto actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('Producto.index')->with('success', 'Producto eliminado exitosamente!');
    }
}
