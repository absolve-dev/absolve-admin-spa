angular.module("absolve.admin.inventory.item")
  .controller("InventoryItemCreateController", [
    "$scope", "$route", "inventoryItemService",
    function($scope, $route, inventoryItemService){
      $scope.newInventoryItemData = {
        // defaults
        name: "",
        active: true,
        inventory_set_id: $scope.inventorySet.id,
        default_price: 0.0
      };
      $scope.submitCreate = function(){
        inventoryItemService.create($scope.newInventoryItemData, function(){
          // success callback
          $(".modal").on("hidden.bs.modal", function(e){
            $route.reload();
          }).modal('hide');
        });
      };
    }
  ]);
