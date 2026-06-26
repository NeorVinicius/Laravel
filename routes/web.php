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


Route::prefix('/login')->group(function(){
    Route::get('/index',  [App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/enviar', [App\Http\Controllers\LoginController::class, 'login'])->name('login.enviar');
    Route::post('/bemvindo', [App\Http\Controllers\LoginController::class, 'login'])->name('login.bemvindo');
});

Route::prefix('/calendario')->group(function(){
    Route::get('/index', [App\Http\Controllers\CalendarioController::class, 'index'])->name('calendario.index');
    Route::post('/add', [App\Http\Controllers\CalendarioController::class, 'add'])->name('calendario.add');
    Route::get('/remove/{id}', [App\Http\Controllers\CalendarioController::class, 'remove'])->name('calendario.remove');
    Route::get('/atualizar/{id}', [App\Http\Controllers\CalendarioController::class, 'atualizar'])->name('calendario.atualizar');
    Route::post('/save', [App\Http\Controllers\CalendarioController::class, 'save'])->name('calendario.save');
});

