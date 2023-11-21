<?php
//Necesario para que detecte el controllador
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompradorController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\emailController;
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
Route::resource('Comprador', CompradorController::class);//retirar esta vista
Route::resource('Producto', ProductoController::class)->middleware('checkUserType:vendedor');
Route::resource('Vendedor', VendedorController::class);//retirar esta vista

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/Admin', function () {
    return view('plantillaAdmin');
});


//Ruta para ver todos los productos.
Route::get('/allproducts', [emailController::class, 'mostrarProductos'])->middleware('checkUserType:comprador');
//Ruta para ver un producto en especial.
Route::post('/seeproduct/{producto}', [emailController::class, 'verProducto'])->middleware('checkUserType:comprador');
//Ruta para realizar la compra.
Route::post('/Comprar/{producto}', [emailController::class, 'comprar'])->middleware('checkUserType:comprador');




//Ruta para controlador de la API.
use App\Http\Controllers\CurrencyController;
Route::get('/get-exchange-rate/{fromCurrency}/{toCurrency}', [CurrencyController::class, 'getExchangeRate'])->middleware('checkUserType:comprador');
