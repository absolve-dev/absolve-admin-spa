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
    public function create(Request $request){
      // post method
      $newInventory = Inventory::create(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "catalog_id" => $request->input("catalog_id"),
        "user_id" => $this->getCurrentTokenUserId($request)
      ));
      return \Response::json($newInventory);
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
      // post method
      if(!is_numeric($inventoryId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      $updateInventory = Inventory::find($inventoryId);
      $updateInventory->update(array(
        "name" => $request->input("name"),
        "active" => $request->input("active")
      ));
      return \Response::json($updateInventory);
    }
    public function delete(Request $request, $inventoryId){
      // get method
      if(!is_numeric($inventoryId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      Inventory::destroy($inventoryId);
      return \Response::json("hello inventory delete");
    }
}
