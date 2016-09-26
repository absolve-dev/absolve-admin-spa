angular.module("absolve.admin.inventory.listing.table")
  .controller("InventoryListingTableController", [
    "$scope", "$routeParams", "inventoryListingService",
    function($scope, $routeParams, inventoryListingService){
      $scope.listings = [];
      var setListings = function(listingsData){
        $scope.listings = listingsData;
      };

      var inventoryItemId = $routeParams.inventoryItemId;
      inventoryListingService.indexByItemId(inventoryItemId, setListings);
    }
  ]);
