<?php

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
global $items;

$items =[
    ["name"=>"d","price" => 30],
    ["name"=>"d","price" => 30],
    ["name"=>"d","price" => 30],
    ["name"=>"d","price" => 30],
    ["name"=>"d","price" => 30],
    ["name"=>"d","price" => 30],
];

Route::get('/items', function () {
    global $items;
    return $items;
});
Route::get('/items/{id}', function ($id) {
    return "This is Get request for one item by id $id";
})->whereNumber("id");
Route::get('/items/{name}', function ($name) {
    return "This is Get request for one item by name $name";
})->whereAlpha("name");