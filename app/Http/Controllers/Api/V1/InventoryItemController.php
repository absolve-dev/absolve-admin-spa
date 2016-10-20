<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventoryItem;

class InventoryItemController extends Controller
{
    //
    public function create(Request $request){
      // post method
      $newInventoryItem = InventoryItem::create(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "inventory_set_id" => $request->input("inventory_set_id"),
        "default_price" => $request->input("default_price"),
        "catalog_item_id" => $request->input("catalog_item_id"),
        "user_id" => $this->getCurrentTokenUserId($request),
      ));
      if(!$newInventoryItem->inventory->user_id){
        $newInventoryItem->inventory->update(array("user_id" => $this->getCurrentTokenUserId($request)));
      }
      return \Response::json($newInventoryItem);
    }

    public function show(Request $request, $inventoryItemId){
      // get method
      if(!is_numeric($inventoryItemId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory item ID."
        ], 400);
      }
      $inventoryItem = InventoryItem::find($inventoryItemId);
      if($inventoryItem){
        if($inventoryItem->user_id != $this->getCurrentTokenUserId($request)){
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
      $inventoryItem->load("inventorySet.inventory"); // eager load relations to include in output
      return \Response::json(
        array_merge(
          $inventoryItem->toArray(),
          ["listings" => $inventoryItem->getInventoryListingsSummary()]
        )
      );
    }
    public function update(Request $request, $inventoryItemId){
      // post method
      if(!is_numeric($inventoryItemId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory item ID."
        ], 400);
      }
      $updateInventoryItem = InventoryItem::find($inventoryItemId);
      if($updateInventoryItem){
        if($updateInventoryItem->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to update this inventory item."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory item found."
        ], 404);
      }
      $updateInventoryItem->update(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "default_price" => $request->input("default_price"),
      ));
      return \Response::json($updateInventoryItem);
    }
    public function delete(Request $request, $inventoryItemId){
      // get method
      if(!is_numeric($inventoryItemId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory item ID."
        ], 400);
      }
      $deleteInventoryItem = InventoryItem::find($inventoryItemId);
      if($deleteInventoryItem){
        if($deleteInventoryItem->user_id != $this->getCurrentTokenUserId($request)){
          // if the current user cant match with this shit
          return \Response::json([
            "code" => 403,
            "message" => "You are not allowed to delete this inventory item."
          ], 403);
        }
      }else{
        return \Response::json([
          "code" => 404,
          "message" => "No inventory item found."
        ], 404);
      }
      $deleteInventoryItem->delete();
      return \Response::json("Inventory item deleted.");
    }
}
