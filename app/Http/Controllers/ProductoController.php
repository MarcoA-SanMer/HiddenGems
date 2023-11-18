<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('crearProducto',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        #return view('crearProducto');
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

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/imagenes', $nombreImagen);
        
            // Guardar el nombre y la ruta de la imagen en la base de datos
            $producto->imagen_nombre = $nombreImagen;
            $producto->imagen_ruta = 'public/imagenes/'.$nombreImagen;
        }

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
            'nueva_imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la nueva imagen
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'precio.required' => 'El campo Precio es obligatorio.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'categoria.required' => 'El campo Categoría es obligatorio.',
            'nueva_imagen.image' => 'El archivo debe ser una imagen.',
            'nueva_imagen.mimes' => 'Solo se permiten archivos de tipo jpeg, png, jpg o gif.',
            'nueva_imagen.max' => 'La imagen no debe ser mayor de 2MB.',
        ]);
    
        $producto = Producto::find($id);
        $producto->Nombre = $request->nombre;
        $producto->Precio = $request->precio;
        $producto->Descripción = $request->descripcion;
        $producto->Categoria = $request->categoria;

        // Actualizar la imagen si se proporciona una nueva
    if ($request->hasFile('nueva_imagen')) {
        // Eliminar la imagen anterior si existe
        if ($producto->imagen_nombre) {
            Storage::delete('public/imagenes/' . $producto->imagen_nombre);
        }

        // Procesar la nueva imagen
        $nuevaImagen = $request->file('nueva_imagen');
        $nombreNuevaImagen = time() . '_' . $nuevaImagen->getClientOriginalName();
        $nuevaImagen->storeAs('public/imagenes', $nombreNuevaImagen);

        // Actualizar la información de la imagen en la base de datos
        $producto->imagen_nombre = $nombreNuevaImagen;
        $producto->imagen_ruta = 'public/imagenes/' . $nombreNuevaImagen;
    }

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
