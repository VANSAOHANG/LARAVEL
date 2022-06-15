<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['sms',"ok"]);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['sms' => 'Invalid credentials'], 404);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = Cookie('jwt', $token, 60 * 24);
        return response()->json(['sms'=>'success','token'=>$token])->withCookie($cookie);
    }
    public function logout(Request $request)
    {
        $cookie = Cookie::forget('jwt');
        return response()->json(['sms'=>'Logged out'])->withCookie($cookie);
    }
}
