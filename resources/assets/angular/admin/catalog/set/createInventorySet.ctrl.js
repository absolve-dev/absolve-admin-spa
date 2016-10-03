angular.module("absolve.admin.catalog.set")
  .controller("InventorySetCreateFromCatalogSetController", [
    "$scope", "$route", "catalogSetService",
    function($scope, $route, catalogSetService){
      $scope.submitCreate = function(){
        catalogSetService.createInventorySetFromCatalogSet(
          $scope.catalogSet.id,
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
