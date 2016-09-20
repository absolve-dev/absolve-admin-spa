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
      $inventories = Inventory::all();
      return \Response::json($inventories);
    }
    public function create(){
      // NOT IMPLEMENTED!!!

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
      $inventory = Inventory::find($inventoryId);

      return \Response::json(
        array_merge(
          $inventory->toArray(),
          ["sets" => $inventory->getInventorySetsSummary()]
        )
      );
    }
    public function update(Request $request, $inventoryId){
      // NOT IMPLEMENTED!!!

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
