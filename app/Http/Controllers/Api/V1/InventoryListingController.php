<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventoryListing;

class InventoryListingController extends Controller
{
    //
    public function create(Request $request){
      // post method
      $newInventoryListing = InventoryListing::create(array(
        "inventory_item_id" => $request->input("inventory_item_id"),
        "name" => $request->input("name"),
        "active" => $request->input("active"),
        "price" => $request->input("price"),
        "quantity" => $request->input("quantity")
      ));
      return \Response::json($newInventoryListing);
    }
    /*
    public function show(Request $request, $inventoryListingId){
      // NOT IMPLEMENTED !!!
      // get method
      if(!is_numeric($inventoryListingId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory listing ID"
        ], 400);
      }
      return \Response::json("hello inventory listing show");
    }
    */
    public function update(Request $request, $inventoryListingId){
      // post method
      if(!is_numeric($inventoryListingId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory listing ID"
        ], 400);
      }
      return \Response::json("hello inventory listing update");
    }
    public function delete(Request $request, $inventoryListingId){
      // post method
      if(!is_numeric($inventoryListingId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory listing ID"
        ], 400);
      }
      return \Response::json("hello inventory listing delete");
    }
}
