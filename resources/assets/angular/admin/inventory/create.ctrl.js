angular.module("absolve.admin.inventory")
  .controller("InventoryCreateController", [
    "$scope", "$route", "inventoryService",
    function($scope, $route, inventoryService){
      $scope.newInventoryData = {
        // defaults
        name: "",
        active: true
      };
      $scope.submitCreate = function(newInventoryData){
        inventoryService.create(
          newInventoryData,
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
