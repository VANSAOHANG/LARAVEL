<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Mission 1: WEB route
Route::get('/users', function () {
    global $users;
    $usernames = "";
    foreach($users as $user){
        $usernames .= $user["name"].",";
    }
    return "Here're the users: ".$usernames;
});
