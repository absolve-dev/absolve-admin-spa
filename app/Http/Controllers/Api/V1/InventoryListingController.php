<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InventoryListing;

class InventoryListingController extends Controller
{
    //
    public function index(){
      // get method
      return \Response::json("hello inventory listing index");
    }
    public function create(){
      // post method
      return \Response::json("hello inventory listing create");
    }

    public function show(Request $request, $inventoryListingId){
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
}
