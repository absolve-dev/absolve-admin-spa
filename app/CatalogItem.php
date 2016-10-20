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

    public function catalogSet(){
      return $this->belongsTo("App\CatalogSet");
    }

    public function getDefaultImageUrlAttribute($value){
      // mutator to get the url
      return $value ? \Storage::disk("s3")->getAdapter()->getClient()->getObjectUrl(env("S3_BUCKET", false),$value) : null;
    }

     /**
     * @return Array
     *
     * returns a summary array with CatalogItem's name, id and image url
     *
     */
    public function getSummaryAttribute(){
      $summaryArray = array(
        "name" => $this->name,
        "id" => $this->id,
        "image_url" => $this->default_image_url
      );

      return $summaryArray;
    }
}
