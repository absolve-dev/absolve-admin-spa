<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Inventory;

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
  public function inventory(){
    return $this->belongsTo("App\Inventory", "inventory_id");
  }

  public static function boot(){
    parent::boot();
    InventorySet::creating(function($inventorySet){
      // add before create hook to get/create the damn parent inventory if it isnt already there
      if(!$inventorySet->inventory_id){
        $inventorySet->inventory_id = $inventorySet->getParentInventory()->id;
      }
    });
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

  public function getParentInventory(){
    $parentInventory = $this->inventory;
    // parent inventory SHOULD exist if it has a linked catalog set
    if(!$parentInventory && $this->catalogSet){
      // this is where i have to dump the damn user ID
      $parentInventory = Inventory::firstOrCreate(array(
        "catalog_id" => $this->catalogSet->catalog_id
      ));
    }
    return $parentInventory;
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

  // the fucking actual relation doesnt work all the fucking time,
  // so i fucking have to cover this shit myself
  public function getInventoryAttribute(){
    return $this->inventory_id ? Inventory::find($this->inventory_id) : null;
  }
}
