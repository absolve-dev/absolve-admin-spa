angular.module("absolve.admin.inventory.set")
  .controller("InventorySetUpdateController", [
    "$scope", "$route", "inventorySetService",
    function($scope, $route, inventorySetService){
      $scope.updateInventorySetData = {
        // defaults
        name: $scope.inventorySet.name,
        active: $scope.inventorySet.active
      };
      $scope.submitUpdate = function(){
        inventorySetService.update(
          $scope.inventorySet.id,
          $scope.updateInventorySetData,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $route.reload();
            }).modal('hide');
          }
        );
      };
    }
  ]);
