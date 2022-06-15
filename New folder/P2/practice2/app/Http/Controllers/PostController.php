<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function getAllItem()
    {
        return "function get all items !";
    }
    public function getOneItem($id)
    {
        return "function get one items by id " . $id;
    }
    public function create()
    {
        return "function create a new items !";
    }
    public function delete($id)
    {
        return "function delete a item by id " . $id;
    }
    public function update($id)
    {
        return "function update one item by id" . $id;
    }
}
