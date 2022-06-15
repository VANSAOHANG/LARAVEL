<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FruitController;
use App\Models\Photo;
use App\Http\Controllers\StudentController;
use App\Models\Student;


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


Route::get('/showstudents', function () {
    return view('students',["students"=>Student::all()]);
});
// Route::get('/showstudents', function () {
//     return view('students',[StudentController::class, 'getStudents']);
// });
