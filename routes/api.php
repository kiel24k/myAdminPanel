<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/login', [AdminController::class, 'login']);
Route::get('/admin_items', [AdminController::class, 'adminItems'])->middleware('auth:sanctum');
Route::post('/message', [AdminController::class, 'chat'])->middleware('auth:sanctum');
Route::get('/listMessage',[AdminController::class, 'listMessage']);
