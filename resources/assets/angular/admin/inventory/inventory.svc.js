angular.module("absolve.admin.inventory")
  .service("inventoryService", function($http){
    // returns "this"

    this.create = function(newInventoryData, successCallback){
      // check for properly passed inventory data
      $http.post("/api/v1/inventory", {
        name: newInventoryData.name,
        active: newInventoryData.active
        //image: newInventoryData.image
      }).success(function(successResponse) {
        successCallback(successResponse.data);
      }).error(function(response) {
        console.log(response);
      });
    };
    this.update = function(inventoryId, updateInventoryData, successCallback){
      // check for properly passed inventory id and data
      $http.post("/api/v1/inventory/" + inventoryId, {
        name: updateInventoryData.name,
        active: updateInventoryData.active
        //image: updateInventoryData.image
      }).success(function(successResponse) {
        successCallback(successResponse.data);
      }).error(function(failureResponse) {
        console.log(failureResponse);
      });
    };

    this.index = function(successCallback){
      $http.get("/api/v1/inventory")
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.show = function(inventoryId, successCallback){
      $http.get("/api/v1/inventory/" + inventoryId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.delete = function(inventoryId, successCallback){
      $http.delete("api/v1/inventory/" + inventoryId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };

  });
