<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\VentaPropuestaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\HomeController;
use App\Models\Producte;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/products', function () {
    return view('productes');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/crearProducte', function () {
    return view('crearProducte');
});
Route::get('/productes', [ProducteController::class, 'index']);

Route::get('/mostrarProductes', function () {
    $productos = Producte::all(); // Suponiendo que Producto es tu modelo para productos
    return view('mostrarProductes', compact('productos'));
})->name('mostrarProductes');
Route::get('/productes/create', [ProducteController::class, 'create'])->name('productes.create');
Route::post('/productes', [ProducteController::class, 'store'])->name('productes.store');
Route::resource("producte", ProducteController::class);
Route::get('/producte', [ProducteController::class, 'index']);
Route::get('/products', [ProducteController::class, 'mostrarProductos'])->name('products');
Route::get('/productes/{producte}', [ProducteController::class,'show'])->name('productes.show');
Route::put('/productes/{producte}', [ProducteController::class, 'update'])->name('productes.update');
Route::delete('/productes/{producte}', [ProducteController::class, 'destroy'])->name('productes.destroy');

require __DIR__.'/auth.php';
