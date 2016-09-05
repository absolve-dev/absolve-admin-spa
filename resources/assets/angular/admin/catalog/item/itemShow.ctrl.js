angular.module("absolve.admin.catalog.item")
  .controller("CatalogItemShowController", [
    "$scope", "$routeParams", "catalogItemService",
    function($scope, $routeParams, catalogItemService){
      $scope.catalogItem = false;
      var setCatalogItem = function(catalogItemData){
        $scope.catalogItem = catalogItemData;
      };

      catalogItemService.show($routeParams.catalogItemId, setCatalogItem);

    }
  ]);
