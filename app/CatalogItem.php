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

    public function getDefaultImageUrlAttribute($value){
      // mutator to get the url
      return $value ? \Storage::disk("s3")->getAdapter()->getClient()->getObjectUrl(env("S3_BUCKET", false),$value) : null;
    }
}
