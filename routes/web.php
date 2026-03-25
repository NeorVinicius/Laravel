<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
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



Route::get('/', [App\Http\Controllers\Principal::class, 'principal']);

Route::get('/somar/{p1}/{p2}', [App\Http\Controllers\Principal::class, 'somar']);
Route::get('/subtrair/{p1}/{p2}', [App\Http\Controllers\Principal::class, 'subtrair']);
Route::get('/multiplicar/{p1}/{p2}', [App\Http\Controllers\Principal::class, 'multiplicar']);
Route::get('/dividir/{p1}/{p2}', [App\Http\Controllers\Principal::class, 'dividir']);


Route::get('/produtos/listar', [App\Http\Controllers\Produtos::class, 'listar']);

Route::get('/clientes/listar', [App\Http\Controllers\Clientes::class, 'listar']);


