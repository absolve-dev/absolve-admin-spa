angular.module("absolve.admin.catalog.set")
  .service("catalogSetService", function($http, inventorySetService){
    // returns "this"

    this.show = function(catalogSetId, successCallback){
      $http.get("/api/v1/catalog/set/" + catalogSetId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.createInventorySetFromCatalogSet = function(catalogSetId, successCallback){
      inventorySetService.createFromCatalogSet(catalogSetId, successCallback);
    };

  });
