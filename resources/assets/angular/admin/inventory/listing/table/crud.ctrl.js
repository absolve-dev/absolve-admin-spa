angular.module("absolve.admin.inventory.listing.table")
  .controller("InventoryListingTableCrudController", [
    "$scope", "$route", "inventoryListingService",
    function($scope, $route, inventoryListingService){
      $scope.updateInventoryListingData = {
        name: $scope.inventoryListing.name,
        active: $scope.inventoryListing.active,
        price: $scope.inventoryListing.price,
        quantity: $scope.inventoryListing.quantity,
      };
      $scope.submitUpdate = function(){
        $scope.inventoryListing.id
        inventoryListingService.update(
          $scope.inventoryListing.id,
          $scope.updateInventoryListingData,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $route.reload();
            }).modal('hide');
          }
        );
      };
      $scope.submitDelete = function(){
        inventoryListingService.delete(
          $scope.inventoryListing.id,
          function(){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              $route.reload();
            }).modal('hide');
          }
        );
      }
  }]);
