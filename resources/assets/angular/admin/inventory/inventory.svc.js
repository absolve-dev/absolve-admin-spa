angular.module("absolve.admin.inventory")
  .service("inventoryService", function($http){
    // returns "this"

    this.index = function(successCallback){
      $http.get("/api/v1/inventory")
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };

    this.show = function(catalogId, successCallback){
      $http.get("/api/v1/inventory/" + catalogId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };

  });
