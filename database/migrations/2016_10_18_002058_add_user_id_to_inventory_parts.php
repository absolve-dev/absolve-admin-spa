<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToInventoryParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("inventory_sets", function($table){
          $table->integer("user_id")
            ->references("id")->on("users")
            ->default(-1);
        });
        Schema::table("inventory_items", function($table){
          $table->integer("user_id")
            ->references("id")->on("users")
            ->default(-1);
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
