<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Comprador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        return view('pruebaComprarEmail', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $productoId)
    {
        // Obtén el producto usando el modelo Producto
        $producto = Producto::find($productoId);

        // Verifica si el producto existe
        if (!$producto) {
            // Manejar la situación en la que el producto no existe
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // Envia la variable $producto a la vista 'verProductoComprar'
        return view('verProductoComprar')->with('producto', $producto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productoId)
    {
        // Obtén el producto usando el modelo Producto
        $producto = Producto::find($productoId);

        // Verifica si el producto existe
        if (!$producto) {
            // Manejar la situación en la que el producto no existe
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // Ahora, $producto contiene toda la información del producto
        $user = Auth::user();



        // Obtén el comprador que corresponde al usuario autenticado
        $comprador = Comprador::where('user_id', $user->id)->first();

        // Verifica si el comprador existe
        if (!$comprador) {
            // Manejar la situación en la que el comprador no existe
            return redirect()->back()->with('error', 'El comprador no existe.');
        }

        // Crear una nueva instancia de Compra
        $compra = new Compra;

        // Asignar los valores a las propiedades de la compra
        $compra->comprador_id = $comprador->id;
        $compra->producto_id = $producto->id;
        $compra->nombre_compra = $producto->Nombre; // Asegúrate de que tu producto tiene una propiedad 'nombre'
        $compra->precio = $producto->Precio; // Asegúrate de que tu producto tiene una propiedad 'precio'

        // Guardar la compra
        $compra->save();



        //Se envia el correo
        Mail::raw("Mediante este correo te confirmamos la compra de $producto->Nombre.\nPrecio: $producto->Precio\nDescripcion: $producto->Descripción\n\n¡Muchas gracias, $user->name, por haber comprado en nuestra tienda online!", function ($message) use ($user) {
            $message->from('hiddengems.oficial@gmail.com', 'Equipo HiddenGems');
            $message->to($user->email);
            $message->subject("Compra en HiddenGems");
        });


        return view('compraRealizada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
