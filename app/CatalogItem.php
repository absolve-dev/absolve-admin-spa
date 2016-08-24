<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    //
    protected $fillable = [
      "name",
      "catalog_set_id",
      "uid_string",
      "json_data",
      "default_image_url"
    ];
}
