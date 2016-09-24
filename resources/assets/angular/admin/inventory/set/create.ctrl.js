angular.module("absolve.admin.inventory.set")
  .controller("InventorySetCreateController", [
    "$scope", "inventorySetService",
    function($scope, inventorySetService){
      $scope.newInventorySetData = {
        // defaults
        name: "",
        active: true,
        inventory_id: $scope.inventory.id
      };
      $scope.submitCreate = function(){
        inventorySetService.create($scope.newInventorySetData, function(){});
      };
    }
  ]);
