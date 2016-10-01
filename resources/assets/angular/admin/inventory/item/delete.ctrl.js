angular.module("absolve.admin.inventory.item")
  .controller("InventoryItemDeleteController", [
    "$scope", "$location", "$routeParams", "inventoryItemService",
    function($scope, $location, $routeParams, inventoryItemService){
      $scope.submitDelete = function(){
        inventoryItemService.delete(
          $routeParams.inventoryItemId,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $location.path("/inventory/set/" + $scope.inventoryItem.inventory_set_id);
              $scope.$apply();
            }).modal('hide');
          }
        );
      };
    }
  ]);
