angular.module("absolve.admin.inventory.set")
  .controller("InventorySetCreateController", [
    "$scope", "$route", "inventorySetService",
    function($scope, $route, inventorySetService){
      $scope.newInventorySetData = {
        // defaults
        name: "",
        active: true,
        inventory_id: $scope.inventory.id
      };
      $scope.submitCreate = function(){
        inventorySetService.create($scope.newInventorySetData, function(){
          // success callback
          $(".modal").on("hidden.bs.modal", function(e){
            $route.reload();
          }).modal('hide');});
      };
    }
  ]);
