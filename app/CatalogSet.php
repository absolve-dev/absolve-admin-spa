<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogSet extends Model
{
    //
    protected $fillable = [
      "name",
      "catalog_id",
      "default_image_url"
    ];
}
