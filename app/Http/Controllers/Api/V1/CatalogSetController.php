<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CatalogSet;

class CatalogSetController extends Controller
{
    //

    public function getShow(Request $request, $catalogSetId){
      if(!is_numeric($catalogSetId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid catalog ID"
        ], 400);
      }
      $showCatalogSet = CatalogSet::find( (int)$catalogSetId );
      $showCatalogSet->load("catalog"); // eager load the damn relations
      return \Response::json(
        array_merge(
          $showCatalogSet->toArray(),
          ["items" => $showCatalogSet->getCatalogItemsSummary()]
        )
      );
    }
}
