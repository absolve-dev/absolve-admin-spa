<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventorySet;

class InventorySetController extends Controller
{
    public function create(){
      // NOT IMPLEMENTED !!!

      // post method
      return \Response::json("hello inventory set create");
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
      // NOT IMPLEMENTED !!!
      
      // post method
      if(!is_numeric($inventorySetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid inventory ID"
        ], 400);
      }
      return \Response::json("hello inventory set update");
    }
}
