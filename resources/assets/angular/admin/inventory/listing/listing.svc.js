angular.module("absolve.admin.inventory.listing")
  .service("inventoryListingService", ["$http", "inventoryItemService", function($http, inventoryItemService){
    this.create = function(newInventoryListingData, successCallback){
      $http.post("/api/v1/inventory/listing/", {
        inventory_item_id: newInventoryListingData.inventory_item_id,
        name: newInventoryListingData.name,
        active: newInventoryListingData.active,
        price: newInventoryListingData.price,
        quantity: newInventoryListingData.quantity
      }).then(function(successResponse){
        successCallback(successResponse.data);
      }, function(failureResponse){
      });
    };
    this.update = function(inventoryListingId, updateInventoryListingData, successCallback){
      $http.post("/api/v1/inventory/listing/" + inventoryListingId, {
        name: updateInventoryListingData.name,
        active: updateInventoryListingData.active,
        price: updateInventoryListingData.price,
        quantity: updateInventoryListingData.quantity
      }).then(function(successResponse){
        successCallback(successResponse.data);
      }, function(failureResponse){
      });
    };
    this.delete = function(inventoryListingId, successCallback){
      $http.get("/api/v1/inventory/listing/" + inventoryListingId + "/delete").then(function(successResponse){
        successCallback(successResponse.data);
      }, function(failureResponse){
      });
    }
    this.indexByItemId = function(inventoryItemId, successCallback){
      // must implement: failure callback
      // inventory item show also includes listings
      var itemSuccessCallback = function(itemData){
        if(typeof itemData.listings !== "undefined"){
          // to check if the listings key exists
          successCallback(itemData.listings);
        }
      };
      inventoryItemService.show(inventoryItemId, itemSuccessCallback);
    };
  }]);
