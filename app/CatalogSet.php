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

    public function getDefaultImageUrlAttribute($value){
      // mutator to get the url

      return $value ? \Storage::disk("s3")->getAdapter()->getClient()->getObjectUrl(env("S3_BUCKET", false),$value) : null;
    }
    // create S3 URL from environment variables
    /*
    protected function createFileUrl($path){
      //https://s3-us-west-1.amazonaws.com/absolve-gaming-dev/
      $region = env("S3_REGION", false);
      $bucket = env("S3_BUCKET", false);
      return ($region && $bucket) ? "https://s3-$region.amazonaws.com/$bucket/$path" : false;
    }
    */
}
