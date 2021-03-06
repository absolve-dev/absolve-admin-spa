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
    public function catalog(){
      return $this->belongsTo("App\Catalog");
    }
    public function catalogItems(){
      return $this->hasMany(CatalogItem::class);
    }

    /**
     * @return Array
     *
     * returns a summary array with CatalogSet's name, id and image url
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

    public function getCatalogItemsSummary(){
      $catalogItems = $this->catalogItems;
      $finalCatalogItems = array();
      foreach($catalogItems as $_catalogItem){
        $_currentCatalogItem = $_catalogItem->summary;
        $finalCatalogItems[] = $_currentCatalogItem;
      }
      return $finalCatalogItems;
    }
}
