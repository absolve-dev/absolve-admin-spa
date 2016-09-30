angular.module("absolve.admin.inventory.listing")
  .controller("InventoryListingCreateController", [
    "$scope", "$route", "inventoryListingService",
    function($scope, $route, inventoryListingService){
      $scope.newInventoryListingData = {
        // defaults
        inventory_item_id: $scope.inventoryItem.id,
        name: "",
        active: true,
        price: 0.0,
        quantity: 0,
      };
      $scope.submitCreate = function(){
        inventoryListingService.create($scope.newInventoryListingData, function(){
          // success callback
          $(".modal").on("hidden.bs.modal", function(e){
            $route.reload();
          }).modal('hide');
        });
      };
    }
  ]);
