<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class AuthController extends Controller
{
    //
    public function postSignup(Request $request){
      $newUser = User::create(array(
        "name" => $request->input("name"),
        "email" => $request->input("email"),
        "password" => bcrypt($request->input("password")),
      ));
      if($newUser){
        Auth::login($newUser, true); // 2nd param is "rememberable"
        return \Response::json(array(
          "token" => Auth::user()->getRememberToken()
        ));
      }else{
        return \Response::json([
          "code" => 400,
          "message" => "User not created successfully."
        ], 400);
      }
    }

    public function postLogin(Request $request){
      $loginData = array(
        "email" => $request->input("email"),
        "password" => $request->input("password")
      );

      if(Auth::attempt($loginData, true)){ // 2nd param is "rememberable"
        return \Response::json(array(
          "token" => Auth::user()->getRememberToken()
        ));
      }else{
        return \Response::json([
          "code" => 400,
          "message" => "Login failed."
        ], 400);
      }
    }
}
