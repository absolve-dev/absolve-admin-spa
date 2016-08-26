<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("inventories", function(Blueprint $table){
          $table->increments("id");
          $table->integer("catalog_id")
            ->references("id")->on("catalogs");
          $table->text("name");
          $table->boolean("active");
          $table->string("image_url")->default(NULL);
        });
        // inventory set
        Schema::create("inventory_sets", function(Blueprint $table){
          $table->increments("id");
          $table->integer("catalog_set_id")
            ->references("id")->on("catalog_sets");
          $table->integer("inventory_id")
            ->references("id")->on("inventories");
          $table->text("name");
          $table->boolean("active");
          $table->string("image_url")->default(NULL);
        });

        // inventory item
        Schema::create("inventory_items", function(Blueprint $table){
          $table->increments("id");
          $table->integer("catalog_item_id")
            ->references("id")->on("catalog_items");
          $table->integer("inventory_set_id")
            ->references("id")->on("inventory_sets");
          $table->text("name");
          $table->boolean("active");
          $table->string("image_url")->default(NULL);
          $table->decimal("default_price", 8 , 2); // 8 precision, 2 scale
        });

        // inventory listing - generic
        Schema::create("inventory_listings", function(Blueprint $table){
          $table->increments("id");
          $table->integer("inventory_item_id")
            ->references("id")->on("inventory_items");
          $table->text("name");
          $table->boolean("active");
          $table->string("image_url")->default(NULL);
          $table->decimal("price", 8 , 2); // 8 precision, 2 scale
          $table->integer("quantity")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("inventories");
        Schema::drop("inventory_sets");
        Schema::drop("inventory_items");
        Schema::drop("inventory_listings");

    }
}
