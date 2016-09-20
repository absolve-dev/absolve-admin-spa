angular.module("absolve.admin.inventory")
  .controller("InventoryIndexController", [
    "$scope", "inventoryService",
    function($scope, inventoryService){
      $scope.inventories = false;
      var setInventories = function(inventoriesData){
        $scope.inventories = inventoriesData;
      };

      inventoryService.index(setInventories);
    }
  ]);
