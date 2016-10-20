angular.module("absolve.admin.catalog")
  .controller("CatalogIndexController", [
    "$scope", "catalogService", "breadcrumbsService",
    function($scope, catalogService, breadcrumbsService){
      $scope.catalogs = false;
      var setCatalogs = function(catalogsData){
        $scope.catalogs = catalogsData;
      };

      catalogService.index(setCatalogs);

      // make the damn breadcrumbs
      breadcrumbsService.pushBreadcrumb({
        text: "Catalogs",
        link: adminCatalogUrlBasePath
      });
    }
  ]);
