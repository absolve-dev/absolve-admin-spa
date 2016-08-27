angular.module("absolve.admin.catalog")
  .controller("CatalogShowController", [
    "$scope", "$routeParams", "catalogService",
    function($scope, $routeParams, catalogService){
      $scope.catalog = false;
      var setCatalog = function(catalogData){
        $scope.catalog = catalogData;
      };

      catalogService.show($routeParams.catalogId, setCatalog);

    }
  ]);
