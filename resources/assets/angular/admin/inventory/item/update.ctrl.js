angular.module("absolve.admin.inventory.item")
  .controller("InventoryItemUpdateController", [
    "$scope", "inventoryItemService",
    function($scope, inventoryItemService){
      $scope.updateInventoryItemData = {
        // defaults
        name: $scope.inventoryItem.name,
        active: $scope.inventoryItem.active,
        default_price: $scope.inventoryItem.default_price
      };
      $scope.submitUpdate = function(){
        inventoryItemService.update(
          $scope.inventoryItem.id,
          $scope.updateInventoryItemData,
          function(){ //success callback
          }
        );
      };
    }
  ]);
