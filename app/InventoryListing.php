<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryListing extends Model
{
    //
    protected $fillable = [
      "inventory_item_id",
      "name",
      "active",
      "price",
      "quantity"
    ];

}
