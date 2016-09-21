angular.module("absolve.admin.inventory.item")
  .service("inventoryItemService", function($http){
    // returns "this"

    this.show = function(inventoryItemId, successCallback){
      $http.get("/api/v1/inventory/item/" + inventoryItemId)
        .then(function(successResponse){
          if(successResponse.data.json_data){
            successResponse.data.json_data = JSON.parse(successResponse.data.json_data);
          }
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };

  });
