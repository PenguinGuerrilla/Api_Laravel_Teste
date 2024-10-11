<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy']);
