angular.module("absolve.admin.inventory.item")
  .controller("InventoryItemShowController", [
    "$scope", "$routeParams", "inventoryItemService",
    function($scope, $routeParams, inventoryItemService){
      $scope.inventoryItem = false;
      var setInventoryItem = function(inventoryItemData){
        $scope.inventoryItem = inventoryItemData;
      };

      inventoryItemService.show($routeParams.inventoryItemId, setInventoryItem);

    }
  ]);
