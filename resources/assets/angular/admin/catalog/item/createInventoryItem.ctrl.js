angular.module("absolve.admin.catalog.item")
  .controller("InventoryItemCreateFromCatalogItemController", [
    "$scope", "$location", "catalogItemService",
    function($scope, $location, catalogItemService){
      $scope.submitCreate = function(){
        catalogItemService.createInventoryItemFromCatalogItem(
          $scope.catalogItem.id,
          function(successData){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              // redirect to inventory that was just created
              $location.url("inventory/item/" + successData.id);
              $scope.$apply();
            }).modal('hide');
          }
        );
      };
    }
  ]);
