<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class emailController extends Controller
{
    public function comprar(Request $request, $productoId)
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


        
        // Aquí iría el código para procesar la compra...



        // Y luego envías el correo sin una vista específica
        Mail::raw("Mediante este correo te confirmamos la compra de $producto->Nombre.\nPrecio: $producto->Precio\nDescripcion: $producto->Descripción\n\n¡Muchas gracias, $user->name, por haber comprado en nuestra tienda online!", function ($message) use ($user) {
            $message->from('hiddengems.oficial@gmail.com', 'Equipo HiddenGems');
            $message->to($user->email);
            $message->subject("Compra en HiddenGems");
        });
    }

    public function mostrarProductos()
    {
        $productos = Producto::all();

        return view('pruebaComprarEmail', ['productos' => $productos]);
    }

}