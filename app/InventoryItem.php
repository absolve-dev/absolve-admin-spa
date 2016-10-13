<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\InventorySet;

class InventoryItem extends Model
{
    protected $fillable = [
      "catalog_item_id",
      "inventory_set_id",
      "name",
      "active",
      "default_price"
    ];
    //
    // first, define relationships
    public function catalogItem(){
      return $this->belongsTo("App\CatalogItem");
    }
    public function inventoryListings(){
      return $this->hasMany("App\InventoryListing");
    }
    public function inventorySet(){
      return $this->belongsTo("App\InventorySet");
    }

    public static function boot(){
      parent::boot();
      InventoryItem::creating(function($inventoryItem){
        if(!$inventoryItem->inventory_set_id){
          $inventoryItem->inventory_set_id = $inventoryItem->getParentInventorySet()->id;
        }
      });
    }

    public function getInventoryListingsSummary(){
      $inventoryListings = $this->inventoryListings;
      $finalInventoryListings = array();
      foreach($inventoryListings as $_inventoryListing){
        $_currentInventoryListing = array();
        $_currentInventoryListing["name"] = $_inventoryListing->name;
        $_currentInventoryListing["price"] = $_inventoryListing->price;
        $_currentInventoryListing["quantity"] = $_inventoryListing->quantity;
        $_currentInventoryListing["id"] = $_inventoryListing["id"];
        $finalInventoryListings[] = $_currentInventoryListing;
      }
      return $finalInventoryListings;
    }

    public function getParentInventorySet(){
      $parentInventorySet = $this->inventory_set;
      // parent inventory set SHOULD exist if it has a linked catalog item
      if(!$parentInventorySet && $this->catalogItem){
        $parentInventorySet = InventorySet::firstOrCreate(array(
          "catalog_set_id" => $this->catalogItem->catalog_set_id
        ));
      }
      return $parentInventorySet;
    }

    // fill mutators
    public function getImageUrlAttribute($value){
      return ($this->catalogItem && !$value) ? $this->catalogItem->default_image_url : $value;
    }
    public function getNameAttribute($value){
      // use catalog name if there is an attached catalog
      return $this->catalogItem ? $this->catalogItem->name : $value;
    }

    public function getInventoryAttribute(){
      // cascade up to get the damn inventory
      return $this->inventorySet->inventory;
    }

}
