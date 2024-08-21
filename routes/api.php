<?php

use App\Events\testingEvent;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/login', [AdminController::class, 'login']);
route::post('/signup',[AdminController::class, 'signup']);
Route::get('/admin_items', [AdminController::class, 'adminItems'])->middleware('auth:sanctum');
Route::post('/message', [AdminController::class, 'chat'])->middleware('auth:sanctum');
Route::get('/listMessage',[AdminController::class, 'listMessage']);

Route::get('/test1/{text}',[AdminController::class, 'testChat'] );
