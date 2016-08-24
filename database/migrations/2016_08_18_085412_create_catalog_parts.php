<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // All of the catalog data created here
        Schema::create("catalogs", function (Blueprint $table) {
          $table->increments("id");
          $table->string("name");
          $table->string("default_image_url")->default("");
          $table->timestamps();
        });
        Schema::create("catalog_sets", function (Blueprint $table) {
          $table->increments("id");
          $table->string("name");
          $table->integer("catalog_id")->unsigned();
          $table->foreign("catalog_id")
            ->references("id")->on("catalogs")
            ->onDelete("cascade");
          $table->string("default_image_url")->default("");
          $table->timestamps();
        });
        Schema::create("catalog_items", function (Blueprint $table) {
          $table->increments("id");
          $table->string("name");
          $table->string("uid_string");
          $table->integer("catalog_set_id")->unsigned();
          $table->foreign("catalog_set_id")
            ->references("id")->on("catalog_sets")
            ->onDelete("cascade");
          $table->string("json_data")->default(""); // meant for json data
          $table->string("default_image_url")->default("");
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop("catalogs");
      Schema::drop("catalog_sets");
      Schema::drop("catalog_items");
    }
}
