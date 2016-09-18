<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inventory;

class InventoryController extends Controller
{
    public function index(){
      // get method
      return \Response::json("hello inventory index");
    }
    public function create(){
      // post method
      return \Response::json("hello inventory create");
    }

    public function show(Request $request, $inventoryId){
      // get method
      if(!is_numeric($inventoryId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      return \Response::json("hello inventory show");
    }
    public function update(Request $request, $inventoryId){
      // post method
      if(!is_numeric($inventoryId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      return \Response::json("hello inventory update");
    }
}
