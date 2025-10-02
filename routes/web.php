<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('livros', LivroController::class);
Route::resource('assuntos', AssuntoController::class);
Route::resource('autores', AutorController::class);
