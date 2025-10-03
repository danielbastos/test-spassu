<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RelatorioLivroController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('livros', LivroController::class);
Route::resource('assuntos', AssuntoController::class);
Route::resource('autores', AutorController::class)->parameters(['autores' => 'autor'])->scoped(['autor' => 'cod_au']);

Route::get('/relatorio/livros', [RelatorioLivroController::class, 'index'])->name('relatorio.livros');
