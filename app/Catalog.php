<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //

    protected $fillable = [
      "name",
      "default_image_url"
    ];
}
