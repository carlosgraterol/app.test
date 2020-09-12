<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Denuncia\DenunciaController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Rutas Laravel 8
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/denuncia', [App\Http\Controllers\DenunciaController::class, 'index'])->name('index');
Route::post('/enviardenuncia', [App\Http\Controllers\DenunciaController::class, 'storedenuncia'])->name('storedenuncia');
