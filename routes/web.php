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



Route::get('/', [App\Http\Controllers\Principal::class, 'index'])->name('pagina-principal');
Route::get('/sobre', [App\Http\Controllers\Sobre::class, 'sobre'])->name('pagina-sobre');
Route::get('/contato', [App\Http\Controllers\Contato::class, 'contato'])->name('pagina-contato');

Route::get('/ds', [App\Http\Controllers\Desenvolvimento::class, 'ds'])->name('pagina-ds');

Route::get('/contato', [App\Http\Controllers\Contato::class, 'contato'])->name('pagina-contato');

