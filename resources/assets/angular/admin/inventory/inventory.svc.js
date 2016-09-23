angular.module("absolve.admin.inventory")
  .service("inventoryService", function($http){
    // returns "this"

    this.create = function(newInventoryData, successCallback){
      $http.post("/api/v1/inventory", {
        name: newInventoryData.name,
        active: newInventoryData.active
        //name: newInventoryData.name,
        //active: newInventoryData.active,
        //image: newInventoryData.image
      }).success(function(response) {
        successCallback(successResponse.data);
      }).error(function(response) {
        console.log(response);
      });
    };

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
