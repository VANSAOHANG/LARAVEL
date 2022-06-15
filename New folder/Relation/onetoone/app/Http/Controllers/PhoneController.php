<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Phone::with("user")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:15|min:3',
            'user_id'=>'required'
        ], [
            'name.required' => 'Name field is required.',
            'user_id.required' => 'user_id field is required.',
        ]);
        $phone = Phone::create($request->all());
        $phone->save();
        return response()->json(['message' => 'Ok!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return $phone;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        $request->validate([
            'name' => 'required|string|max:15|min:3',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',

        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email input field is required.',
            'email.email' => 'Email input field must be email address.',
        ]);
        $phone->update($request->all());
        return response()->json(['message' => 'Ok!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Phone::destroy($id);
    }
}
