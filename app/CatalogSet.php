<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogSet extends Model
{
    protected $table = "catalog_sets";
    //
    protected $fillable = [
      "name",
      "catalog_id",
      "default_image_url"
    ];
}
