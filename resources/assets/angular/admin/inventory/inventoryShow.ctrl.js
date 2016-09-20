angular.module("absolve.admin.inventory")
  .controller("InventoryShowController", [
    "$scope", "$routeParams", "inventoryService",
    function($scope, $routeParams, inventoryService){
      $scope.inventory = false;
      var setInventory = function(inventoryData){
        $scope.inventory = inventoryData;
      };

      inventoryService.show($routeParams.inventoryId, setInventory);

    }
  ]);
