angular.module("absolve.admin.catalog.set")
  .controller("CatalogSetShowController", [
    "$scope", "$routeParams", "catalogSetService", "breadcrumbsService",
    function($scope, $routeParams, catalogSetService, breadcrumbsService){
      $scope.catalogSet = false;
      var setCatalogSet = function(catalogSetData){
        $scope.catalogSet = catalogSetData;

        // make the damn breadcrumbs
        breadcrumbsService.pushBreadcrumb({
          text: "Catalogs",
          link: adminCatalogUrlBasePath
        });
        breadcrumbsService.pushObject(catalogSetData.catalog, adminCatalogUrlBasePath);
        breadcrumbsService.pushObject(catalogSetData, adminCatalogSetUrlBasePath);
      };

      catalogSetService.show($routeParams.catalogSetId, setCatalogSet);

    }
  ]);
