angular.module("absolve.admin.catalog.set")
  .controller("CatalogSetShowController", [
    "$scope", "$routeParams", "catalogSetService",
    function($scope, $routeParams, catalogSetService){
      $scope.catalogSet = false;
      var setCatalogSet = function(catalogSetData){
        $scope.catalogSet = catalogSetData;
      };

      catalogSetService.show($routeParams.catalogSetId, setCatalogSet);

    }
  ]);
