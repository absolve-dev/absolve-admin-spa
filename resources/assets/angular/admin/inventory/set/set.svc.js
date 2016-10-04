angular.module("absolve.admin.inventory.set")
  .service("inventorySetService", function($http){
    // returns "this"
    this.create = function(newInventorySetData, successCallback){
      // check for properly passed data
      $http.post("/api/v1/inventory/set", {
        name: newInventorySetData.name,
        active: newInventorySetData.active,
        inventory_id: newInventorySetData.inventory_id,
        catalog_set_id: newInventorySetData.catalog_set_id,
      }).then(function(successResponse){
        successCallback(successResponse.data);
      }, function(failureResponse){

      });
    };
    this.createFromCatalogSet = function(catalogSetId, successCallback){
      var newInventorySetData = {
        name: "",
        active: true,
        catalog_set_id: catalogSetId,
      };
      this.create(newInventorySetData, successCallback);
    };
    this.update = function(inventorySetId, updateInventorySetData, successCallback){
      // check for properly passed inventory id and data
      $http.post("/api/v1/inventory/set/" + inventorySetId, {
        name: updateInventorySetData.name,
        active: updateInventorySetData.active
        //image: updateInventorySetData.image
      }).success(function(successResponse) {
        successCallback(successResponse.data);
      }).error(function(failureResponse) {
        console.log(failureResponse);
      });

    };
    this.show = function(inventorySetId, successCallback){
      $http.get("/api/v1/inventory/set/" + inventorySetId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
    this.delete = function(inventorySetId, successCallback){
      $http.delete("api/v1/inventory/set/" + inventorySetId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };

  });
