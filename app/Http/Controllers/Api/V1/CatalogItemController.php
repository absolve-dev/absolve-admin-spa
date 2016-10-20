<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CatalogItem;

class CatalogItemController extends Controller
{
    //

    public function getShow(Request $request, $catalogItemId){
      if(!is_numeric($catalogItemId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid catalog ID"
        ], 400);
      }
      $showCatalogItem = CatalogItem::find( (int)$catalogItemId );
      $showCatalogItem->load("catalogSet.catalog"); // eager load the damn relations
      return \Response::json(
        // load catalog set and the damn catalog
        $showCatalogItem->toArray()
      );
    }
}
