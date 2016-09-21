angular.module("absolve.admin.inventory.set")
  .controller("InventorySetShowController", [
    "$scope", "$routeParams", "inventorySetService",
    function($scope, $routeParams, inventorySetService){
      $scope.inventorySet = false;
      var setInventorySet = function(inventorySetData){
        $scope.inventorySet = inventorySetData;
      };

      inventorySetService.show($routeParams.inventorySetId, setInventorySet);

    }
  ]);
