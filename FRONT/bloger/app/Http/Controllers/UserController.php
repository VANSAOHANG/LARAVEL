<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }
    public function getUserPost()
    {
        return User::with("post")->get();
    }
    public function getUserPostComment()
    {
        return User::with(["post","comment"])->get();
    }
    public function getCountPostComment()
    {
        return User::withCount(["post","comment"])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->save();
        return response()->json(["sms"=>"Ok"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::with(["post"])->findOrFail($id);
    }
    public function getUserAndPostByEmail(Request $request)
    {
        $email = $request->email;
        return  User::with(["post","post.comment"])->where("email","=",$email)->get();
        // return User::get();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(["sms"=>"Ok updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
        
    }
}
