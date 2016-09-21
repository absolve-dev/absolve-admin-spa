<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    //
    // first, define relationships
    public function catalogItem(){
      return $this->belongsTo("App\CatalogItem");
    }
    public function inventoryListings(){
      return $this->hasMany("App\InventoryListing");
    }

    public function getInventoryListingsSummary(){
      $inventoryListings = $this->inventoryListings;
      $finalInventoryListings = array();
      foreach($inventoryListings as $_inventoryListing){
        $_currentInventoryListing = array();
        $_currentInventoryListing["name"] = $_inventoryListing->name;
        $_currentInventoryListing["id"] = $_inventoryListing["id"];
        $finalInventoryListings[] = $_currentInventoryListing;
      }
      return $finalInventoryListings;
    }

    // fill mutators
    public function getImageUrlAttribute($value){
      return ($this->catalogItem && !$value) ? $this->catalogItem->default_image_url : $value;
    }
}
