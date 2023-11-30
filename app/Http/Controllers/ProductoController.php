<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function misProductos()
    {
        $user = auth()->User();
        $vendedor = $user->vendedor;
        $productos = $vendedor->productos;
        return view('misProductos',compact('productos'));
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
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'categoria' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la nueva imagen
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'precio.required' => 'El campo Precio es obligatorio.',
            'precio.numeric' => 'El campo Precio debe ser un numero.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
            'categoria.required' => 'El campo Categoría es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'Solo se permiten archivos de tipo jpeg, png, jpg o gif.',
            'imagen.max' => 'La imagen no debe ser mayor de 2MB.',
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

        $user = auth()->User();
        $vendedor = $user->vendedor;

        if ($producto->save()) {
            // La operación de guardado fue exitosa, redirigir a Producto.index
            $producto->vendedores()->attach($vendedor->id);
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
        $vendedor = auth()->User()->vendedor;
        $consulta = $vendedor->productos()->find($id);

        if ($consulta) {
            return view('editarProducto', compact('producto'));
        } else {
            return redirect()->back()->with('error', 'El producto no te pertenece.');
        }
        
    }

    public function colaborate_show(Request $request)
    {
        $id = $request->input('id');
        $producto = Producto::find($id);
        return view('colaborate', compact('producto'));
    }

    public function colaborate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_vendedor' => [
                'required',
                'numeric',
                Rule::exists('vendedors', 'id'), // Verifica que el ID del vendedor exista en la tabla 'vendedors'
                Rule::unique('producto_vendedor', 'vendedor_id')->where(function ($query) use ($request) {
                    return $query->where('producto_id', $request->id_producto);
                }),
            ],
        ], [
            'id_vendedor.required' => 'El campo id vendedor es obligatorio.',
            'id_vendedor.numeric' => 'El campo id vendedor debe ser un número.',
            'id_vendedor.exists' => 'El vendedor no existe.',
            'id_vendedor.unique' => 'La colaboracion ya existe',
        ]);
    
        if ($validator->fails()) {
            return redirect('misproductos')
                        ->withErrors($validator)
                        ->withInput();
        }
        $id_vendedor = $request->input('id_vendedor');
        $id_product = $request->input('id_producto');
        $producto = Producto::find($id_product);
        $vendedor = vendedor::find($id_vendedor);

        $producto->vendedores()->attach($vendedor->id);
        return redirect()->route('Producto.index')->with('success', 'Colaboración exitosa!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'categoria' => 'required',
            'nueva_imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la nueva imagen
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'precio.required' => 'El campo Precio es obligatorio.',
            'precio.numeric' => 'El campo Precio debe ser numerico.',
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
