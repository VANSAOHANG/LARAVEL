<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/users', function () {
//     global $users;
//     return $users;

// });
// Route::get('/users/{userIndex}', function ($userIndex) {
//     global $users;
//     if($userIndex < count($users)-1){
//         return $users[$userIndex];

//     }else{

//         return "Cannot find the user with index " . $userIndex;
//     }

// })->whereNumber("userIndex");;
// Route::get('/users/{username}', function ($username) {
//     global $users;
//     $result = '';
//     $isValid = false;
//     foreach($users as $user){
//         if($user["name"] == $username){
//             $result = $user;
//             $isValid = true;
//         };
//     }
//     if($isValid==false){
//         $result = "Cannot find the user of name : ".$username;
//     }
//     return $result;

// })->whereAlpha("username");



// Mission 5: Group routes
Route::prefix('users')->group(function () {

    // Mission 2: Get all users
    Route::get('/', function () {
        global $users;
        return $users;
    
    });

    // Mission 3: Get user by index
    Route::get('/{userIndex}', function ($userIndex) {
        global $users;
        if($userIndex < count($users)-1){
            return $users[$userIndex];
    
        }else{
    
            return "Cannot find the user with index " . $userIndex;
        }
    
    })->whereNumber("userIndex");

    // Mission 4: Get user by name
    Route::get('/{username}', function ($username) {
        global $users;
        $result = '';
        $isValid = false;
        foreach($users as $user){
            if($user["name"] == $username){
                $result = $user;
                $isValid = true;
            };
        }
        if($isValid==false){
            $result = "Cannot find the user of name : ".$username;
        }
        return $result;
    
    })->whereAlpha("username");

    // Mission 6: Get posts
    Route::get('/{userIndex}/post/{postIndex}', function ($userIndex,$postIndex) {
        global $users;
        $result = "";
        $isUserIndex = false;
        $isPostIndex = false;
        for($i= 0; $i <= count($users)-1;$i++){
            if($i == $userIndex && $isUserIndex == false){
                $isUserIndex = true;
                $userPost = $users[$i]["posts"];
                for($pID = 0; $pID <= count($userPost)-1;$pID++){
                    if($pID == $postIndex && $isPostIndex == false){
                        $isPostIndex = true;
                        $result = $userPost[$pID];
                    }
                }
            }
        }
        if($isPostIndex == false){
            $result = "Cannot find the post with id " . $postIndex . " for " . $userIndex;
        };

        return $result;
    })->whereNumber("userIndex")->whereNumber("postIndex");
    Route::fallback(function () {
        return "You cannot get a user like this !";
    });
    
});
Route::fallback(function () {
    return "404 Not Found !";
});