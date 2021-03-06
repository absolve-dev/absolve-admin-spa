<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getCurrentTokenUserId($request){
      $authToken = $request->header("auth-token");
      if($authToken){
        $authUser = User::where("remember_token", $authToken)->first();
        return $authToken ? $authUser->id : false;
      }else{
        return false;
      }
    }
}
