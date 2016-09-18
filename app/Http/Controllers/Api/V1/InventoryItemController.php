<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventoryItem;

class InventoryItemController extends Controller
{
    //
    public function index(){
      // get method
      return \Response::json("hello inventory item index");
    }
    public function create(){
      // post method
      return \Response::json("hello inventory item create");
    }

    public function show(Request $request, $inventoryItemId){
      // get method
      if(!is_numeric($inventoryItemId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory item ID"
        ], 400);
      }
      return \Response::json("hello inventory item show");
    }
    public function update(Request $request, $inventoryItemId){
      // post method
      if(!is_numeric($inventoryItemId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory item ID"
        ], 400);
      }
      return \Response::json("hello inventory item update");
    }
}
