angular.module("absolve.admin.inventory.listing")
  .service("inventoryListingService", ["$http", "inventoryItemService", function($http, inventoryItemService){
    this.create = function(newInventoryListingData, successCallback){
      $http.post("/api/v1/inventory/listing/", {
        // NOT IMPLEMENTED !!!
        inventory_item_id: newInventoryListingData.inventory_item_id,
        name: newInventoryListingData.name,
        active: newInventoryListingData.active,
        price: newInventoryListingData.price,
        quantity: newInventoryListingData.quantity
      }).then(function(successResponse){
        if(successResponse.data.json_data){
          successResponse.data.json_data = JSON.parse(successResponse.data.json_data);
        }
        successCallback(successResponse.data);
      }, function(failureResponse){

      });;
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
