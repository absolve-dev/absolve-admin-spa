<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = "inventories";

    protected $fillable = [
      "catalog_id",
      "name",
      "active",
      "image_url"
    ];

    // first, define relationships
    public function catalog(){
      return $this->belongsTo("App\Catalog");
    }
    public function inventorySets(){
      return $this->hasMany("App\InventorySet");
    }

    // fill mutators
    public function getImageUrlAttribute($value){
      return ($this->catalog && !$value) ? $this->catalog->default_image_url : $value;
    }
    public function getNameAttribute($value){
      // use catalog name if there is an attached catalog
      return $this->catalog ? $this->catalog->name : $value;
    }

    // other methods
    public function getInventorySetsSummary(){
      $inventorySets = $this->inventorySets;
      $finalInventorySets = array();
      foreach($inventorySets as $_inventorySet){
          $_currentInventorySet = array();
          $_currentInventorySet["name"] = $_inventorySet->name;
          $_currentInventorySet["id"] = $_inventorySet["id"];
          $_currentInventorySet["image_url"] = $_inventorySet->image_url;
          $finalInventorySets[] = $_currentInventorySet;
      }
      return $finalInventorySets;
    }
}
