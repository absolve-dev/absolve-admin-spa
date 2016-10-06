<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function postSignup(Request $request){
      return \Response::json("hello auth signup");
    }

    public function postLogin(Request $request){
      return \Response::json("hello auth login");
    }
}
