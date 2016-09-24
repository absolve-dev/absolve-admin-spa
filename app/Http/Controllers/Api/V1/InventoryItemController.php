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
      $newInventoryItem = InventoryItem::create(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "inventory_set_id" => $request->input("inventory_set_id"),
        "default_price" => $request->input("default_price"),

      ));
      // post method
      return \Response::json($newInventoryItem);
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
      $inventoryItem = InventoryItem::find($inventoryItemId);
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
          "message" => "Not a valid inventory item ID"
        ], 400);
      }
      $updateInventoryItem = InventoryItem::find($inventoryItemId);
      $updateInventoryItem->update(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "default_price" => $request->input("default_price"),
      ));
      return \Response::json($updateInventoryItem);
    }
}
