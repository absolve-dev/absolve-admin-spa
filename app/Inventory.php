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
}
