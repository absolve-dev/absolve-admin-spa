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

  // fill mutators
  public function getImageUrlAttribute($value){
    return ($this->catalogSet && !$value) ? $this->catalogSet->default_image_url : $value;
  }
}
