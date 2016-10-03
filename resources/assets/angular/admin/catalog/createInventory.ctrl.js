angular.module("absolve.admin.catalog")
  .controller("InventoryCreateFromCatalogController", [
    "$scope", "$route", "catalogService",
    function($scope, $route, catalogService){
      $scope.submitCreate = function(){
        catalogService.createInventoryFromCatalog(
          $scope.catalog.id,
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
