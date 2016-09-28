angular.module("absolve.admin.inventory.listing.table")
  .controller("InventoryListingTableCrudController", [
    "$scope", "inventoryListingService",
    function($scope, inventoryListingService){
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
          function(){ //success callback
          }
        );
      };
      $scope.submitDelete = function(){
        inventoryListingService.delete(
          $scope.inventoryListing.id,
          function(){ // success callback
          }
        );
      }
  }]);
