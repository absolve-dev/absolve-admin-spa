<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EbaySettings extends Model
{
    //
    protected $table = "ebay_settings";

    protected $fillable = [
      "user_id",
      "auth_token"
    ];

    public function user(){
      return $this->belongsTo("App\User");
    }

}
