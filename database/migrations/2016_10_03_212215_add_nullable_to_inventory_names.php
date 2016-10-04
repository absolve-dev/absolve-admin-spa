<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToInventoryNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("inventories", function($table){
          $table->text("name")
            ->nullable()->change();
        });
        Schema::table("inventory_sets", function($table){
          $table->text("name")
            ->nullable()->change();
        });
        Schema::table("inventory_items", function($table){
          $table->text("name")
            ->nullable()->change();
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
    }
}
