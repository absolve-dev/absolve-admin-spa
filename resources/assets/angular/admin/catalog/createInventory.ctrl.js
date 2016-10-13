angular.module("absolve.admin.catalog")
  .controller("InventoryCreateFromCatalogController", [
    "$scope", "$location", "catalogService",
    function($scope, $location, catalogService){
      $scope.submitCreate = function(){
        catalogService.createInventoryFromCatalog(
          $scope.catalog.id,
          function(successData){
            // success callback
            $(".modal").on("hidden.bs.modal", function(e){
              // redirect to inventory that was just created
              $location.url("inventory/" + successData.id);
              $scope.$apply();
            }).modal('hide');
          }
        );
      };
    }
  ]);
