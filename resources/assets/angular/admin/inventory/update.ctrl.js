angular.module("absolve.admin.inventory")
  .controller("InventoryUpdateController", [
    "$scope", "inventoryService",
    function($scope, inventoryService){
      $scope.updateInventoryData = {
        // defaults
        name: $scope.inventory.name,
        active: $scope.inventory.active
      };
      $scope.submitUpdate = function(){
        inventoryService.update(
          $scope.inventory.id,
          $scope.updateInventoryData,
          function(){}
        );
      };
    }
  ]);
