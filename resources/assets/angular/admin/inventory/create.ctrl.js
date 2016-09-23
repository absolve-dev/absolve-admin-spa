angular.module("absolve.admin.inventory")
  .controller("InventoryCreateController", [
    "$scope", "inventoryService",
    function($scope, inventoryService){
      $scope.newInventoryData = {
        // defaults
        name: "",
        active: true
      };
      $scope.submitCreate = function(newInventoryData){
        inventoryService.create(newInventoryData, function(){});
      };
    }
  ]);
