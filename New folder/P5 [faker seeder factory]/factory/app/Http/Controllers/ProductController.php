<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct(){
        // $products = DB::select("SELECT * FROM products");
        // $insert = DB::insert("INSERT INTO products(name,price) VALUES ('D',300)");
        // $delete = DB::delete("DELETE FROM products WHERE   id =11");
        // $update = DB::update("UPDATE products  SET name=?,price=? WHERE id = ?" ,['dd',99,3]);
        // $products = DB::table('products')->get();
        // $select = DB::table('products')->select("price","id")->get();
        // $select = DB::table('products')->where("price",99)->get();
        // $select = DB::table('products')->first();
        // $select = DB::table('products')->find(2);
        $select = DB::table('products')->value("price");

        return $select;
    }
    public function insertProduct(){
        $insert = DB::insert("INSERT INTO products(name,price) VALUES ('D',300)");
        $delete = DB::delete("DELETE FROM products WHERE id =11");
        return $delete;
    }
}
