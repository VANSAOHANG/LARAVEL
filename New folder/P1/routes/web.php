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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/welcome2', function () {
//     return view('welcome2');
// });

// Route::get('/teachers', function () {
//     return "Good morning teacher !";
// });

// Route::get('/student/{id}/age/{age}', function ($id,$age) {
//     return "Student id: " .$id . " and student age: " . $age;
// });



// Route::get('/name/{name}/price/{price}', function ($name,$price) {
//     return "Book name : " . $name . " price " . $price;
// });


// Route::get('/task/{title}', function ($title,$author="vansao") {
//     return "Book title : " . $title . " author " . $author;
// });

// Route::get('/task/{title?}', function ($title = "homework") {
//     return "task title : " . $title;
// })->where("title","[A-Za-z]+");
// Route::get('/task/{id?}', function ($id = 10) {
//     return "task id : " . $id;
// }) -> where("id","[0-9]+");

// Route::get('/task/{title?}/{id?}', function ($title = "Harry Porter",$id = 10) {
//     return "task title : ".$title." task id : " . $id;
// }) ->where([ 'title' => '[A-Za-z]+','id' => '[0-9]+']);

Route::fallback(function () {
    return "404 page not found !";
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "I am a user !";
    });
    Route::get('/product', function () {
        return "This is my product !";
    });
});

Route::prefix('students')->group(function () {
    Route::get('/name', function () {
        return "I am a Vansao !";
    });
    Route::get('/age', function () {
        return "I am 20 years old !";
    });
    Route::get('/province', function () {
        return "I'm from PVH !";
    });
    Route::get('/score', function () {
        return "My score is 1/1 !";
    });

});


Route::get('/product/{product}', function ($product) {
    return "Product name : " . $product;
})->whereAlpha("product");
Route::get('/product/{price}', function ($product) {
    return "Product price : " . $product;
})->whereNumber("price");