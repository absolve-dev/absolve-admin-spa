angular.module("absolve.admin.inventory.listing")
  .service("inventoryListingService", ["$http", "inventoryItemService", function($http, inventoryItemService){
    this.create = function(newListingData, successCallback){
      $http.post("/api/v1/inventory/listing/", {
        // NOT IMPLEMENTED !!!
      });
    };
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
