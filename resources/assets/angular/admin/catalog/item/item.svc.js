angular.module("absolve.admin.catalog.item")
  .service("catalogItemService", function($http, inventoryItemService){
    // returns "this"

    this.show = function(catalogItemId, successCallback){
      $http.get("/api/v1/catalog/item/" + catalogItemId)
        .then(function(successResponse){
          successResponse.data.json_data = JSON.parse(successResponse.data.json_data);
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.createInventoryItemFromCatalogItem = function(catalogItemId, successCallback){
      inventoryItemService.createFromCatalogItem(catalogItemId, successCallback);
    };

  });
