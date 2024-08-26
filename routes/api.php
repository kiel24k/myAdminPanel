<?php

use App\Events\testingEvent;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EloquentRelationshipController;
use App\Http\Controllers\ViewerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return response()->json($request->user());
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

Route::get('/table-sort', [AdminController::class, 'tableSort']);

Route::post('/axios-test',[AdminController::class, 'axiosTest']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/user1', [AuthController::class, 'user1']);

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index']);
});

Route::group(['middleware' => ['editor']], function () {
    Route::get('/editor-dashboard', [EditorController::class, 'index']);
});

Route::group(['middleware' => ['viewer']], function () {
    Route::get('/viewer-dashboard', [ViewerController::class, 'index']);
});

Route::post('/login-cookies', [AuthController::class, 'loginCookies']);
Route::get('/get-user', [AuthController::class, 'getUser'])->middleware('auth:sanctum');
Route::post('/logout-cookies', [AuthController::class, 'logoutCookies']);