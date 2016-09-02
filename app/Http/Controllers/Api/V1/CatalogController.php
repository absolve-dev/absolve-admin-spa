<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Catalog;

class CatalogController extends Controller
{
    //
    public function getIndex(){
      $catalogs = Catalog::all()->toArray();
      return \Response::json($catalogs);
    }

    public function getShow(Request $request, $catalogId){
      if(!is_numeric($catalogId)){
        // must be numeric so stop
        return \Response::json([
          "code" => 400,
          "message" => "Not a valid catalog ID"
        ], 400);
      }
      $showCatalog = Catalog::find( (int)$catalogId );

      return \Response::json(
        array_merge(
          $showCatalog->toArray(),
          ["sets" => $showCatalog->getCatalogSetsSummary()] // add set data to json response
        )
      );
    }
}
