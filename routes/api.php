<?php

use App\Events\testingEvent;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EloquentRelationshipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/login', [AdminController::class, 'login']);
route::post('/signup',[AdminController::class, 'signup']);
Route::get('/admin_items', [AdminController::class, 'adminItems'])->middleware('auth:sanctum');
Route::post('/message', [AdminController::class, 'chat'])->middleware('auth:sanctum');
Route::get('/listMessage',[AdminController::class, 'listMessage']);

Route::get('/all-users',[AdminController::class, 'allUsers']);
route::get('/get-user-message/{senderID}/{receiverID}', [AdminController::class, 'getUserMessage']);
route::post('/user-message',[AdminController::class, 'userMessage']);

Route::get('/test1/{text}/{id}',[AdminController::class, 'testChat'] )->middleware('auth:sanctum');

route::get('/one-to-one', [EloquentRelationshipController::class, 'one_to_one']);
route::get('/one-to-many', [EloquentRelationshipController::class, 'one_to_many']);


