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
Route::resource('Producto', ProductoController::class);//->middleware('checkUserType:vendedor');//verificamos si es vendedor
Route::resource('Comprador', CompradorController::class);
Route::resource('Vendedor', VendedorController::class);

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








//Esta ruta es de prueba, para probar el boton de logout
Route::get('/logout', function () {
    return view('prueba');
})->middleware('auth');

//ruta de prueba para simular compra
Route::get('/verp', [emailController::class, 'mostrarProductos'])->middleware('checkUserType:comprador');

//Ruta para el envio de correos personalizados
Route::post('/Comprar/{producto}', [emailController::class, 'comprar'])->middleware('checkUserType:comprador');