<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken("mytoken")->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token,
        ];
        return response()->json($response);

    }
    public function login(Request $request)
    {
        
        $token = $user->createToken("mytoken")->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token,
        ];
        return response()->json($response);

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // $user = User::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return response('Login invalid', 503);
        // }

        // return $user->createToken($request->email)->plainTextToken;
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(["sms" => "ok"]);
    }
}
