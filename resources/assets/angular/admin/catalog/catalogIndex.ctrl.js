angular.module("absolve.admin.catalog")
  .controller("CatalogIndexController", [
    "$scope", "catalogService",
    function($scope, catalogService){
      $scope.catalogs = false;
      var setCatalogs = function(catalogsData){
        $scope.catalogs = catalogsData;
      };

      catalogService.index(setCatalogs);
    }
  ]);
