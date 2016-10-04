angular.module("absolve.admin.catalog.item")
  .controller("InventoryItemCreateFromCatalogItemController", [
    "$scope", "$route", "catalogItemService",
    function($scope, $route, catalogItemService){
      $scope.submitCreate = function(){
        catalogItemService.createInventoryItemFromCatalogItem(
          $scope.catalogItem.id,
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
