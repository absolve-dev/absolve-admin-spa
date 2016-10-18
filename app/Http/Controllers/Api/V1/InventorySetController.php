<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventorySet;
use App\Inventory;
use App\CatalogSet;

class InventorySetController extends Controller
{
    public function create(Request $request){
      // post method
      $newInventorySet = InventorySet::create(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "inventory_id" => $request->input("inventory_id"),
        "catalog_set_id" => $request->input("catalog_set_id"),
        "user_id" => $this->getCurrentTokenUserId($request),
      ));
      if(!$newInventorySet->inventory->user_id){
        $newInventorySet->inventory->update(array("user_id" => $this->getCurrentTokenUserId($request)));
      }
      return \Response::json($newInventorySet);
    }

    public function show(Request $request, $inventorySetId){
      // get method
      if(!is_numeric($inventorySetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID."
        ], 400);
      }
      $inventorySet = InventorySet::find($inventorySetId);
      if($inventorySet){
        if($inventorySet->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to view this inventory set."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory set found."
        ], 404);
      }
      return \Response::json(
        array_merge(
          $inventorySet->toArray(),
          ["items" => $inventorySet->getInventoryItemsSummary()]
      ));
    }
    public function update(Request $request, $inventorySetId){
      // post method
      if(!is_numeric($inventorySetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID."
        ], 400);
      }
      $updateInventorySet = InventorySet::find($inventorySetId);
      if($updateInventorySet){
        if($updateInventorySet->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to update this inventory set."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory set found."
        ], 404);
      }
      $updateInventorySet->update(array(
        "name" => $request->input("name"),
        "active" => $request->input("active")
      ));
      return \Response::json($updateInventorySet);
    }

    public function delete(Request $request, $inventorySetId){
      // get method
      if(!is_numeric($inventorySetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory set ID."
        ], 400);
      }
      $deleteInventorySet = InventorySet::find($inventorySetId);
      if($deleteInventorySet){
        if($deleteInventorySet->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to delete this inventory set."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory set found."
        ], 404);
      }
      $deleteInventorySet->delete();
      return \Response::json("Inventory set deleted.");
    }
}
