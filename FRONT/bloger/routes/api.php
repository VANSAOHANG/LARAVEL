<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
Route::apiresource("users",UserController::class);
Route::get("usersPosts",[UserController::class,'getUserPost']);
Route::get("usersPostsComments",[UserController::class,'getUserPostComment']);
Route::get("CountPostComment",[UserController::class,'getCountPostComment']);
Route::get("userAndPost",[UserController::class,'getUserAndPostByEmail']);
Route::apiresource("posts",PostController::class);
Route::apiresource("comments",CommentController::class);

Route::get("searchPost/{title}",[PostController::class,"search"]);