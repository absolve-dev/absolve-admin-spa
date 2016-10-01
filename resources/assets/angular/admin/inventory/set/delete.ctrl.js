angular.module("absolve.admin.inventory.set")
  .controller("InventorySetDeleteController", [
    "$scope", "$location", "$routeParams", "inventorySetService",
    function($scope, $location, $routeParams, inventorySetService){
      $scope.submitDelete = function(){
        inventorySetService.delete(
          $routeParams.inventorySetId,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $location.path("/inventory/" + $scope.inventorySet.inventory_id);
              $scope.$apply();
            }).modal('hide');
          }
        );
      };
    }
  ]);
