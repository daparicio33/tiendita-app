<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\TpagoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/control', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para administrador
Route::resource('control/administrador/productos/catalogos', CatalogoController::class)
->names('control.administrador.productos.catalogos');
Route::resource('control/administrador/productos/categorias', CategoriaController::class)
->names('control.administrador.productos.categorias');
//ruta para usuario
Route::resource('control/usuarios', UsuarioController::class)
->names('control.usuarios');
//rutas para compras
Route::resource('control/compras/proveedores', ProveedoreController::class)
->names('control.compras.proveedores');
Route::resource('control/compras/ingresos', IngresoController::class)
->names('control.compras.ingresos');
//ruta para tipos de pago
Route::resource('control/tipospago', TpagoController::class)
->names('control.tipospago');
//rutas para vendedor
Route::resource('control/vendedor/ventas', VentaController::class)
->names('control.vendedor.ventas');
Route::resource('control/vendedor/clientes', ClienteController::class)
->names('control.vendedor.clientes');
