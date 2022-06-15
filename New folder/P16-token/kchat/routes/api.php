<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);
Route::get("items", [ItemController::class, "index"]);
Route::get("items/{id}", [ItemController::class, "show"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete("logout", [UserController::class, "logout"]);
    Route::post("items", [ItemController::class, "store"]);
    Route::put("items/{id}", [ItemController::class, "update"]);
    Route::delete("items/{id}", [ItemController::class, "destroy"]);
});
