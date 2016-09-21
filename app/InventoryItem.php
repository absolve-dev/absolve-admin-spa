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
    // fill mutators
    public function getImageUrlAttribute($value){
      return ($this->catalogItem && !$value) ? $this->catalogItem->default_image_url : $value;
    }
}
