angular.module("absolve.admin.catalog")
  .controller("CatalogShowController", [
    "$scope", "$routeParams", "catalogService", "breadcrumbsService",
    function($scope, $routeParams, catalogService, breadcrumbsService){
      $scope.catalog = false;
      var setCatalog = function(catalogData){
        $scope.catalog = catalogData;

        // make the damn breadcrumbs
        breadcrumbsService.pushBreadcrumb({
          text: "Catalogs",
          link: adminCatalogUrlBasePath
        });
        breadcrumbsService.pushObject(catalogData, adminCatalogUrlBasePath);
      };

      catalogService.show($routeParams.catalogId, setCatalog);

    }
  ]);
