<?php

namespace App\Http\Controllers;

use App\Models\Banana;
use Illuminate\Http\Request;
class BananaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return Banana::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $banana =new Banana();
        $banana->name = $request->name;
        $banana->price = $request->price;
        $banana->status = $request->status; 
        $banana-> save();
        return response()-> json(['message'=>'Ok Keyyoo']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
            $banana = Banana::where('id','=',$id)-> get();
            if(count($banana)<=0){
                return response()->json(['message'=>'Banana not found!']);
            }else{
                return  response()->json(Banana::findOrFail($id));
            }
        // if(Banana::find($id)){

        //     return Banana::find($id) ;
        // }else{
        //     return " Banana not found!!😂🤣😂";
        // }
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
        $banana = Banana::findOrFail($id);
        $banana->name = $request->name;
        $banana->price = $request->price;
        $banana->status = $request->status;
        $banana-> save();
        return response()-> json(['message'=>'updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $banana = Banana::where('id','=',$id)-> get();
        if(count($banana)>0){
            Banana::destroy($id);
            return response()->json(['message'=>'Deleted success!']);
        }else{
            return response()->json(['message'=>'Banana cannot deleted']);
        }

        // if(Banana::destroy($id)){
        //     return 'Delete success😎😋';
        // }else{
        //     return 'Not found!';
        // }
    }
}
