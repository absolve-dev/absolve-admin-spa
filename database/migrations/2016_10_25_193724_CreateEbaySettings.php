<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbaySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("ebay_settings", function(Blueprint $table){
          $table->increments("id");
          $table->integer("user_id")
            ->references("id")->on("users");
          $table->text("auth_token")
            ->nullable();
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
        //
        Schema::drop("ebay_settings");
    }
}
