<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/', function () {
    return view('admin/index');
});

Route::group(["prefix" => "/api/v1", "namespace" => "Api\V1"], function(){

  Route::group(["prefix" => "/catalog"], function(){
    Route::group(["prefix" => "/set"], function(){
      Route::get("/{catalogSetId}", "CatalogSetController@getShow");
    });
    Route::group(["prefix" => "/item"], function(){
      Route::get("/{catalogItemId}", "CatalogItemController@getShow");
    });
    Route::get("/", "CatalogController@getIndex");
    Route::get("/{catalogId}", "CatalogController@getShow");
  });

  Route::group(["prefix" => "/inventory"], function(){
    Route::group(["prefix" => "/set"], function(){
      Route::post("/", "InventorySetController@create");
      Route::get("/{inventorySetId}", "InventorySetController@show");
      Route::post("/{inventorySetId}", "InventorySetController@update");
    });
    Route::group(["prefix" => "/item"], function(){
      Route::post("/", "InventoryItemController@create");
      Route::get("/{inventoryItemId}", "InventoryItemController@show");
      Route::post("/{inventoryItemId}", "InventoryItemController@update");
    });
    Route::group(["prefix" => "/listing"], function(){
      Route::get("/", "InventoryListingController@index");
      Route::post("/", "InventoryListingController@create");
      Route::get("/{inventoryListingId}", "InventoryListingController@show");
      Route::post("/{inventoryListingId}", "InventoryListingController@update");
    });
    Route::get("/", "InventoryController@index");
    Route::post("/", "InventoryController@create");
    Route::get("/{inventoryId}", "InventoryController@show");
    Route::post("/{inventoryId}", "InventoryController@update");
  });

});
