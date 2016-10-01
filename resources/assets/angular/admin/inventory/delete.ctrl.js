angular.module("absolve.admin.inventory")
  .controller("InventoryDeleteController", [
    "$scope", "$location", "$routeParams", "inventoryService",
    function($scope, $location, $routeParams, inventoryService){
      $scope.submitDelete = function(){
        inventoryService.delete(
          $routeParams.inventoryId,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $location.path("/inventory/");
              $scope.$apply();
            }).modal('hide');
          }
        );
      };
    }
  ]);
