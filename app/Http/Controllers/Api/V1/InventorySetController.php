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
      $newInventorySet = InventorySet::create(array(
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "inventory_id" => $request->input("inventory_id"),
        "catalog_set_id" => $request->input("catalog_set_id"),
      ));
      // post method
      return \Response::json($newInventorySet);
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
      $inventorySet = InventorySet::find($inventorySetId);
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
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      $updateInventorySet = InventorySet::find($inventorySetId);
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
          "message" => "Not a valid inventory set ID"
        ], 400);
      }
      InventorySet::destroy($inventorySetId);
      return \Response::json("hello inventory set delete");
    }
}
