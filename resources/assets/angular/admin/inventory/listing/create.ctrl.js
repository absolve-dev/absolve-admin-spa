angular.module("absolve.admin.inventory.listing")
  .controller("InventoryListingCreateController", [
    "$scope", "inventoryListingService",
    function($scope, inventoryListingService){
      $scope.newInventoryListingData = {
        // defaults
        inventory_item_id: $scope.inventoryItem.id,
        name: "",
        active: true,
        price: 0.0,
        quantity: 0,
      };
      console.log($scope.newInventoryListingData);
      $scope.submitCreate = function(){
        inventoryListingService.create($scope.newInventoryListingData, function(){});
      };
    }
  ]);
