angular.module("absolve.admin.inventory")
  .controller("InventoryUpdateController", [
    "$scope", "$route", "inventoryService",
    function($scope, $route, inventoryService){
      $scope.updateInventoryData = {
        // defaults
        name: $scope.inventory.name,
        active: $scope.inventory.active
      };
      $scope.submitUpdate = function(){
        inventoryService.update(
          $scope.inventory.id,
          $scope.updateInventoryData,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $route.reload();
            }).modal('hide');}
        );
      };
    }
  ]);
