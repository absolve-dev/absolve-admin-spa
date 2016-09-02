<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    protected $table = "catalogs";

    protected $fillable = [
      "name",
      "default_image_url"
    ];

    public function catalogSets(){
      return $this->hasMany(CatalogSet::class);
    }

    public function getCatalogSetsSummary(){
      $catalogSets = $this->catalogSets->toArray();
      $finalCatalogSets = array();
      foreach($catalogSets as $_catalogSet){
        $_currentCatalog = array();
        $_currentCatalog["name"] = $_catalogSet["name"];
        $_currentCatalog["id"] = $_catalogSet["id"];
        $finalCatalogSets[] = $_currentCatalog;
      }
      return $finalCatalogSets;
    }
}
