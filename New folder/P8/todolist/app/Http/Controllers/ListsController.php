<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lists::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Lists = new Lists();
        $Lists->title = $request->title;
        $Lists->description = $request->description;
        $Lists->status = $request->status;
        $Lists->save();
        return response()->json(["message" => "Lists saved successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Lists::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Lists = Lists::findOrFail($id);
        $Lists->title = $request->title;
        $Lists->description = $request->description;
        $Lists->status = $request->status;
        $Lists->save();
        return response()->json(["message" => "Lists update successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Lists::destroy($id);
    }
}
