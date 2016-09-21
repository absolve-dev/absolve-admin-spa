angular.module("absolve.admin.inventory.set")
  .service("inventorySetService", function($http){
    // returns "this"

    this.show = function(inventorySetId, successCallback){
      $http.get("/api/v1/inventory/set/" + inventorySetId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };

  });
