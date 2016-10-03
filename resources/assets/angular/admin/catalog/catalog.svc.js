angular.module("absolve.admin.catalog")
  .service("catalogService", function($http, inventoryService){
    // returns "this"
    this.index = function(successCallback){
      $http.get("/api/v1/catalog")
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.show = function(catalogId, successCallback){
      $http.get("/api/v1/catalog/" + catalogId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.createInventoryFromCatalog = function(catalogId, successCallback){
      inventoryService.createFromCatalog(catalogId, successCallback);
    }

  });
