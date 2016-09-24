angular.module("absolve.admin.inventory.set")
  .controller("InventorySetUpdateController", [
    "$scope", "inventorySetService",
    function($scope, inventorySetService){
      $scope.updateInventorySetData = {
        // defaults
        name: $scope.inventorySet.name,
        active: $scope.inventorySet.active
      };
      $scope.submitUpdate = function(){
        inventorySetService.update(
          $scope.inventorySet.id,
          $scope.updateInventorySetData,
          function(){ //success callback
          }
        );
      };
    }
  ]);
