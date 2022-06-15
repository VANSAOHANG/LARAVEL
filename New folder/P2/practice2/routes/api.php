<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/items', [PostController::class,"getAllItem"]);
Route::get('/items/{id}', [PostController::class,"getOneItem"]);
Route::post('/items/create', [PostController::class,"create"]);
Route::delete('/items/{id}', [PostController::class,"delete"]);
Route::put('/items/{id}', [PostController::class,"update"]);


Route::get('/tasks', [TaskController::class,"index"]);
Route::post('/tasks', [TaskController::class,"store"]);
