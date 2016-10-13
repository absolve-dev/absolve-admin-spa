angular.module("absolve.admin.catalog.set")
  .controller("InventorySetCreateFromCatalogSetController", [
    "$scope", "$location", "catalogSetService",
    function($scope, $location, catalogSetService){
      $scope.submitCreate = function(){
        catalogSetService.createInventorySetFromCatalogSet(
          $scope.catalogSet.id,
          function(successData){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              // redirect to inventory that was just created
              $location.url("inventory/set/" + successData.id);
              $scope.$apply();
            }).modal('hide');
          }
        );
      };
    }
  ]);
