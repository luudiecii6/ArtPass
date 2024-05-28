<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ArtpassController;
use App\Http\Controllers\ComprarEntradaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UserController;

//INDEX
Route::get('/index', [ArtpassController::class, 'index']);
Route::get('/evento/{id}', [ArtPassController::class, 'show'])->name('evento.show');


//LOGIN
Route::get('/', [LoginController::class, 'muestraForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login');
Route::post('/login-laravel', [LoginController::class, 'checkLoginLaravel'])->name('login.laravel');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.formu');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//REGISTRO
Route::get('/formularioRegistro', [RegistroController::class, 'vistarRegistro']);
Route::post('/crearUsuario', [RegistroController::class, 'crearUsuario'])->name('crearUsuario');

//ENTRADA
Route::get('/entradas/comprar/{instancia}/{entradaId}', [ComprarEntradaController::class, 'comprar'])->name('entradas.comprar');
Route::post('/entradas/guardar', [ComprarEntradaController::class, 'guardar'])->name('entradas.guardar');
Route::get('/tus-entradas', [ComprarEntradaController::class, 'verEntradas'])->name('entradas.usuario');


//EVENTO
Route::get('/crear-evento', [EventoController::class, 'crearEvento'])->name('events.create');
Route::post('/guardar-evento', [EventoController::class, 'store'])->name('events.store');
Route::get('/eventos/{tipo}', [EventoController::class, 'mostrarPorTipo']);

//USUARIO
Route::get('/usuarios', [UserController::class, 'listarUsers'])->name('usuarios.index');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.eliminar');
Route::post('/usuarios/{id}/quitarAdmin', [UserController::class, 'quitarAdmin'])->name('usuarios.quitarAdmin');
Route::post('/usuarios/{id}/hacerAdmin', [UserController::class, 'hacerAdmin'])->name('usuarios.hacerAdmin');



