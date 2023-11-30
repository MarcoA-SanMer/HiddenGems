<?php
//Necesario para que detecte el controllador
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompradorController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emailController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});                                                              
//                                                   ->middleware('checkUserType:comprador'); verificamos si es comprador
//                                                   ->middleware('auth'); Para solo verificar que este logeado sin importar el tipo de cuenta
//                                                   ->middleware('checkUserType:vendedor');//verificamos si es vendedor

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
        Route::get('/home', function () {
            $user = Auth::user();
    
            if ($user->user_type == 'vendedor') {
                return redirect()->route('Producto.index');
            }
    
            if ($user->user_type == 'comprador') {
                return redirect()->route('allproducts');
            }
        })->name('home');
});

Route::get('/Admin', function () {
    return view('plantillaAdmin');
});


//Ruta para ver todos los productos.
//Route::get('/allproducts', [emailController::class, 'mostrarProductos'])->middleware('checkUserType:comprador');
//Ruta para ver un producto en especial.
//Route::post('/seeproduct/{producto}', [emailController::class, 'verProducto'])->middleware('checkUserType:comprador');
//Ruta para realizar la compra.
//Route::post('/Comprar/{producto}', [emailController::class, 'comprar'])->middleware('checkUserType:comprador');





//Ruta index para vendedores
Route::resource('Producto', ProductoController::class)->middleware('checkUserType:vendedor');
Route::post('Producto/colaborate', [ProductoController::class, 'colaborate_show'])->name('Producto.colaborate_s')->middleware('checkUserType:vendedor');
Route::post('Producto/colaboration', [ProductoController::class, 'colaborate'])->name('Producto.colaborate')->middleware('checkUserType:vendedor');
//Usuarios
Route::post('User/edit', [UserController::class, 'edit'])->name('User.edit')->middleware('auth');
Route::get('User/show_user_info', [UserController::class, 'show_user_info'])->name('User.show_user_info')->middleware('auth');
Route::delete('User/delete/{id}', [UserController::class, 'destroy'])->name('User.destroy')->middleware('auth');
//Ruta para ver los productos de los vendedores
Route::get('/misproductos', [ProductoController::class, 'misProductos'])->name('misproductos')->middleware('checkUserType:vendedor');


//Ruta para ver todos los productos.
Route::get('/allproducts', [CompraController::class, 'index'])->name('allproducts')->middleware('checkUserType:comprador');
//Ruta para ver un producto en especial.
Route::post('/seeproduct/{producto}', [CompraController::class, 'create'])->middleware('checkUserType:comprador');
//Ruta para realizar la compra.
Route::post('/Comprar/{producto}', [CompraController::class, 'store'])->middleware('checkUserType:comprador');

//Ruta para mostrar el historial de compras
Route::get('/historial', [CompraController::class, 'historial'])->name('historial')->middleware('checkUserType:comprador');
//Ruta para borrar alguna compra del historial
Route::delete('/borrarcompra/{compraid}', [CompraController::class, 'destroy'])->name('borrarcompra.destroy')->middleware('checkUserType:comprador');



//Ruta para mostrar mis cventas
Route::get('/misventas', [ProductoController::class, 'misventas'])->name('misventas')->middleware('checkUserType:vendedor');

//Ruta para controlador de la API.
use App\Http\Controllers\CurrencyController;
Route::get('/get-exchange-rate/{fromCurrency}/{toCurrency}', [CurrencyController::class, 'getExchangeRate'])->middleware('checkUserType:comprador');
