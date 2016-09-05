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
      $catalogSets = $this->catalogSets;
      $finalCatalogSets = array();
      foreach($catalogSets as $_catalogSet){
        $_currentCatalogSet = array();
        $_currentCatalogSet["name"] = $_catalogSet->name;
        $_currentCatalogSet["id"] = $_catalogSet["id"];
        $_currentCatalogSet["image_url"] = $_catalogSet->default_image_url;
        $finalCatalogSets[] = $_currentCatalogSet;
      }
      return $finalCatalogSets;
    }
}
