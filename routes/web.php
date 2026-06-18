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

Route::prefix('/aluno')->group(function(){
    Route::get('/index', [App\Http\Controllers\AlunoController::class, 'index'])->name('aluno.index');
    Route::post('/add', [App\Http\Controllers\AlunoController::class, 'add'])->name('aluno.add');
    Route::get('/remove/{id}', [App\Http\Controllers\AlunoController::class, 'remove'])->name('aluno.remove');
    Route::get('/atualizar/{id}', [App\Http\Controllers\AlunoController::class, 'atualizar'])->name('aluno.atualizar');
    Route::post('/save', [App\Http\Controllers\AlunoController::class, 'save'])->name('aluno.save');
});

Route::prefix('/curso')->group(function(){
    Route::get('/index', [App\Http\Controllers\CursoController::class, 'index'])->name('curso.index');
    Route::post('/add', [App\Http\Controllers\CursoController::class, 'add'])->name('curso.add');
    Route::get('/remove/{id}', [App\Http\Controllers\CursoController::class, 'remove'])->name('curso.remove');
    Route::get('/atualizar/{id}', [App\Http\Controllers\CursoController::class, 'atualizar'])->name('curso.atualizar');
    Route::post('/save', [App\Http\Controllers\CursoController::class, 'save'])->name('curso.save');
});

Route::prefix('/professor')->group(function(){
    Route::get('/index', [App\Http\Controllers\ProfController::class, 'index'])->name('professor.index');
    Route::post('/add', [App\Http\Controllers\ProfController::class, 'add'])->name('professor.add');
    Route::get('/remove/{id}', [App\Http\Controllers\ProfController::class, 'remove'])->name('professor.remove');
    Route::get('/atualizar/{id}', [App\Http\Controllers\ProfController::class, 'atualizar'])->name('professor.atualizar');
    Route::post('/save', [App\Http\Controllers\ProfController::class, 'save'])->name('professor.save');
});

Route::prefix('/adm')->group(function(){
    Route::get('/index', [App\Http\Controllers\AdmController::class, 'index'])->name('adm.index');
    Route::post('/add', [App\Http\Controllers\AdmController::class, 'add'])->name('adm.add');
    Route::get('/remove/{id}', [App\Http\Controllers\AdmController::class, 'remove'])->name('adm.remove');
    Route::get('/atualizar/{id}', [App\Http\Controllers\AdmController::class, 'atualizar'])->name('adm.atualizar');
    Route::post('/save', [App\Http\Controllers\AdmController::class, 'save'])->name('adm.save');
});

Route::prefix('/componente')->group(function(){
    Route::get('/index', [App\Http\Controllers\AdmController::class, 'index'])->name('componente.index');
    Route::post('/add', [App\Http\Controllers\AdmController::class, 'add'])->name('componente.add');
    Route::get('/remove/{id}', [App\Http\Controllers\AdmController::class, 'remove'])->name('componente.remove');
    Route::get('/atualizar/{id}', [App\Http\Controllers\AdmController::class, 'atualizar'])->name('componente.atualizar');
    Route::post('/save', [App\Http\Controllers\AdmController::class, 'save'])->name('componente.save');
});