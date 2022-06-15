<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function getItems()
    {
        // $products = DB::select("SELECT * FROM items");
        // $products = DB::select("SELECT * FROM items");
        // $products = DB::table("items")->whereBetween("id",[6,9])->get();
        // $products = DB::table("items")->whereNotBetween("id",[6,9])->get();
        // $products = DB::table("items")->whereNotIn("id",[6,9,2])->get();
        // $products = DB::table("items")->orderBy("barcode")->get();
        // $products = DB::table("items")->orderByDesc("id")->get();
        // $products = DB::table("items")->inRandomOrder("id")->get();
        // $products = DB::table("items")->count("id");
        // $products = DB::table("items")->sum("id");
        // $products = DB::table("items")->avg("id");
        $products = DB::table("items")->skip(9)->take(1)->get();

        return $products;
    }
}
