<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function insertPerson(){
        $insert = DB::insert("INSERT INTO products(name,price) VALUES ('D',300)");
        return $insert;
    }
}
