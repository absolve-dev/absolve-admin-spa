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
});
