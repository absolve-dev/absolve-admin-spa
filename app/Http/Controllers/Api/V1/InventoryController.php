<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inventory;

class InventoryController extends Controller
{
    public function index(Request $request){
      // get method
      $inventories = Inventory::where(array(
        // the funny part is that this handles all of the front-end ng views
        "user_id" => $this->getCurrentTokenUserId($request)
      ))->get();
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
          "message" => "Not a valid inventory ID."
        ], 400);
      }
      $inventory = Inventory::find($inventoryId);
      if($inventory){
        if($inventory->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to view this inventory."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory found."
        ], 404);
      }
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
          "message" => "Not a valid inventory ID."
        ], 400);
      }
      $updateInventory = Inventory::find($inventoryId);
      if($updateInventory){
        if($updateInventory->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to update this inventory."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory found."
        ], 404);
      }
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
          "message" => "Not a valid inventory ID."
        ], 400);
      }
      $deleteInventory = Inventory::find($inventoryId);
      if($deleteInventory){
        if($deleteInventory->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to delete this inventory."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory found."
        ], 404);
      }
      $deleteInventory->delete();
      return \Response::json("Inventory deleted.");
    }
}
