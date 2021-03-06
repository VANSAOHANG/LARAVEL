<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
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
Route::get('/students', [StudentController::class,"getStudents"]);
Route::get('/students/{id}', [StudentController::class,"getStudentsById"]);
Route::apiresource('items', ItemController::class);
Route::apiresource('products', ProductController::class);
Route::apiresource('tasks', TaskController::class);


