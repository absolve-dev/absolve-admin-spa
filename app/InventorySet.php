<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventorySet extends Model
{
  //
  protected $table = "inventory_sets";

  protected $fillable = [
    "catalog_set_id",
    "inventory_id",
    "name",
    "active",
    "image_url"
  ];

  // first, define relationships
  public function catalogSet(){
    return $this->belongsTo("App\CatalogSet");
  }
  public function inventoryItems(){
    return $this->hasMany("App\InventoryItem");
  }

  public function getInventoryItemsSummary(){
    $inventoryItems = $this->inventoryItems;
    $finalInventoryItems = array();
    foreach($inventoryItems as $_inventoryItem){
      $_currentInventoryItem = array();
      $_currentInventoryItem["name"] = $_inventoryItem->name;
      $_currentInventoryItem["id"] = $_inventoryItem["id"];
      $_currentInventoryItem["image_url"] = $_inventoryItem->image_url;
      $_currentInventoryItem["default_price"] = $_inventoryItem->default_price;
      $finalInventoryItems[] = $_currentInventoryItem;
    }
    return $finalInventoryItems;
  }

  // fill mutators
  public function getImageUrlAttribute($value){
    // if there is no image, and the catalog set has one
    return ($this->catalogSet && !$value) ? $this->catalogSet->default_image_url : $value;
  }
  public function getNameAttribute($value){
    // use catalog name if there is an attached catalog
    return $this->catalogSet ? $this->catalogSet->name : $value;
  }
}
