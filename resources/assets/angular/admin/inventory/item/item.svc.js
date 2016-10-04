angular.module("absolve.admin.inventory.item")
  .service("inventoryItemService", function($http){
    // returns "this"
    this.create = function(newInventoryItemData, successCallback){
      $http.post("/api/v1/inventory/item", {
        name: newInventoryItemData.name,
        active: newInventoryItemData.active,
        inventory_set_id: newInventoryItemData.inventory_set_id,
        default_price: newInventoryItemData.default_price,
        catalog_item_id: newInventoryItemData.catalog_item_id,
      }).then(function(successResponse){
        if(successResponse.data.json_data){
          successResponse.data.json_data = JSON.parse(successResponse.data.json_data);
        }
        successCallback(successResponse.data);
      }, function(failureResponse){

      });
    };
    this.createFromCatalogItem = function(catalogItemId, successCallback){
      var newInventoryItemData = {
        name: "",
        active: true,
        catalog_item_id: catalogItemId,
        default_price: 0.0,
      };
      this.create(newInventoryItemData, successCallback);
    };
    this.update = function(inventoryItemId, updateInventoryItemData, successCallback){
      $http.post("/api/v1/inventory/item/" + inventoryItemId, {
        name: updateInventoryItemData.name,
        active: updateInventoryItemData.active,
        default_price: updateInventoryItemData.default_price,
      }).then(function(successResponse){
        if(successResponse.data.json_data){
          successResponse.data.json_data = JSON.parse(successResponse.data.json_data);
        }
        successCallback(successResponse.data);
      }, function(failureResponse){

      });
    };
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
    this.delete = function(inventoryItemId, successCallback){
      $http.delete("api/v1/inventory/item/" + inventoryItemId)
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){

        });
    };
  });
