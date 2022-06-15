<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mango;

class MangoController extends Controller
{
    // public function getInfo()
    // {
    //     $select = DB::table('mangos')->where("id", 10)->get();
    //     $select = DB::table('mangos')->select("id", 10)->get();

    //     return $select;
    // }
    public function index(){
        // return Mango::get();
        // return Mango::find(1);
        // return Mango::all("name","price");
        // return Mango::where('id', 2)->get(['name','price']);
        // return Mango::where('id', 2)->get();
        // return Mango::whereNotBetween('id', [1,3])->get();
        // return Mango::find([1,2,9]);
        // return Mango::orderBy('id', 'DESC')->get();
        // return Mango::orderBy(DB::raw('RAND()'))->get();
        // return Mango::orderByRaw("RAND()")->get();
        return Mango::inRandomOrder()->get();

    }
}
