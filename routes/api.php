<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;


Route::get('/todos', [TodoController::class, 'index']);
Route::get('/users', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('users')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/all', [UserController::class, 'getAllUsers']);
    Route::get('/{id}', [UserController::class, 'show']);
});
