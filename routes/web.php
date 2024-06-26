<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\VentaPropuestaController;
use App\Http\Controllers\VentaDetalleController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Models\Producte;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CompraProductoController;


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

Route::middleware(['auth'])->group(function () {
    // Rutas accesibles para todos los usuarios autenticados


 
    // Lógica para restringir el acceso según el rol del usuario
    Route::middleware(['role.check'])->group(function () {
        Route::get('/index', function () {
            return view('index');
        })->middleware(['verified'])->name('index');
    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/personal', [ProfileController::class, 'showAllUsers'])->name('personal');
    
        Route::get('/index', [IndexController::class, 'showLastUsersAndGraph'])->name('indexPrincipal');
        Route::get('/', [IndexController::class, 'showLastUsersAndGraph'])->name('indexPrincipal');
    
        Route::get('/crear-categoria', [ProducteController::class, 'mostrarFormularioCrearCategoria'])->name('crear-categoria');
        Route::post('/crear-categoria', [ProducteController::class, 'crearCategoria'])->name('productos.crear-categoria');
    
        Route::get('/crearCategorias', [CategoriaController::class, 'create'])->name('categorias.create');
        Route::post('/crearCategorias', [CategoriaController::class, 'store'])->name('categorias.store');
        Route::get('/mostrarCategorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
        Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
        Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
        Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    
        Route::resource('clientes', ClienteController::class);
        Route::get('/mostrarClientes', [ClienteController::class, 'mostrarTodos'])->name('mostrarClientes');
    
        Route::post('/cambiar-idioma/{idioma}', [LanguageController::class, 'cambiarIdioma'])->name('cambiar-idioma');
    
    
    Route::get('/orders/{id}', [VentaPropuestaController::class, 'generateInvoice'])->name('orders.generateInvoice');
    Route::get('/orders/{id}/generate-invoice-buy', [CompraController::class, 'generateInvoiceBuy'])->name('orders.generateInvoiceBuy');
    
    Route::get('/facturas', [CompraProductoController::class, 'index'])->name('invoices.index');
    
    Route::get('/orders/{id}/all-invoice-sell', [CompraProductoController::class, 'generateInvoiceAllSell'])->name('orders.generateInvoiceAllSell');
    Route::get('/orders/{id}/all-invoice', [CompraProductoController::class, 'generateInvoiceAllBuy'])->name('orders.generateInvoiceAllBuy');
        Route::get('/graficPoblacio', [ClienteController::class, 'graficPoblacio'])->name('graficPoblacio');
        Route::get('/graficEstat', [VentaPropuestaController::class, 'graficEstat'])->name('ventas.graficEstat');
        Route::get('/error', function () {
            return view('error');
        })->name('error');
    
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
        Route::get('/productes', [ProducteController::class, 'index'])->name('producte.index');
    
        Route::get('/products', [ProducteController::class, 'productos'])->name('products');
        Route::get('/mostrarProductos', [ProducteController::class, 'mostrarProductos'])->name('mostrarProductos');
    
    
        Route::get('/productes/{producte}', [ProducteController::class,'show'])->name('productes.show');
        Route::put('/productes/{producte}', [ProducteController::class, 'update'])->name('productes.update');
        Route::delete('/productes/{producte}', [ProducteController::class, 'destroy'])->name('productes.destroy');
    
        Route::resource('ventas', VentaPropuestaController::class);
        Route::post('/ventas/{id}/cambiarEstado', [VentaPropuestaController::class, 'cambiarEstado'])->name('ventas.cambiarEstado');
        Route::post('ventas/storeProductes',  [VentaPropuestaController::class, 'storeProductes'])->name('ventas.storeProductes');
        Route::get('ventas/posarProductesProposta/{id}', [VentaPropuestaController::class, 'posarProductesProposta'])->name('ventas.posarProductesProposta');
        Route::get('/venta-propuesta/{id}', [VentaPropuestaController::class, 'show'])->name('VentaPropuesta.show');
        Route::get('/mostrarventas/{id}', [VentaPropuestaController::class, 'index_ventas'])->name('mostrarventas');
    
        Route::get('/errorVenta', function () {
            return view('errorVenta');
        })->name('errorVenta');
    
        Route::get('/compra/{id}', [VentaPropuestaController::class, 'show'])->name('compra.show');
        Route::resource('venedors', VendedorController::class);
        Route::resource('compras', CompraController::class);
        
        Route::get('/crearCompraProduct', [ProducteController::class, 'createCompraProducte'])->name('productes.createCompraProducte');
        Route::post('productes/storeProducteCompra', [ProducteController::class, 'storeCompraProducte'])->name('productes.storeCompraProducte');
        
        Route::get('/grafico-productos', [ProducteController::class, 'graficoProductos'])->name('productes.graficoProductos');
    });
});


require __DIR__.'/auth.php';
