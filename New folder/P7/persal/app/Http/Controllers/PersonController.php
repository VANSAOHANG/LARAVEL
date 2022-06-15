<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Person;
class PersonController extends Controller
{
    // public function getInfo()
    // {
    //     $select = DB::table('people')->where("id", 10)->get();

    //     return $select;
    // }
    public function index(){
        return Person::all();
    }
}
