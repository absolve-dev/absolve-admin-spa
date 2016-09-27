angular.module("absolve.admin.inventory.listing")
  .controller("InventoryListingCreateController", [
    "$scope", "inventoryListingService",
    function($scope, inventoryListingService){
      $scope.newInventoryListingData = {
        // defaults
      };
      $scope.submitCreate = function(){
        inventoryListingService.create($scope.newInventoryListingData, function(){});
      };
    }
  ]);
