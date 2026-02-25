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
Route::get('/contato', [App\Http\Controllers\Contato::class, 'contato']);

// Aluno
Route::get('/login/aluno', [App\Http\Controllers\Aluno::class, '/login']);
Route::get('/boletim', [App\Http\Controllers\Boletim::class, 'boletim']);
Route::get('/presenca', [App\Http\Controllers\Presenca::class, 'presenca']);
Route::get('/desenpenho', [App\Http\Controllers\Contato::class, 'desenpenho']);



