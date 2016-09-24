angular.module("absolve.admin.inventory.item")
  .controller("InventoryItemCreateController", [
    "$scope", "inventoryItemService",
    function($scope, inventoryItemService){
      $scope.newInventoryItemData = {
        // defaults
        name: "",
        active: true,
        inventory_set_id: $scope.inventorySet.id,
        default_price: 0.0
      };
      $scope.submitCreate = function(){
        inventoryItemService.create($scope.newInventoryItemData, function(){});
      };
    }
  ]);
