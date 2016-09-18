<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventorySet;

class InventorySetController extends Controller
{
    public function index(){
      // get method
      return \Response::json("hello inventory set index");
    }
    public function create(){
      // post method
      return \Response::json("hello inventory set create");
    }

    public function show(Request $request, $inventorySetId){
      // get method
      if(!is_numeric($inventorySetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      return \Response::json("hello inventory set show");
    }
    public function update(Request $request, $inventorySetId){
      // post method
      if(!is_numeric($inventorySetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      return \Response::json("hello inventory set update");
    }
}
