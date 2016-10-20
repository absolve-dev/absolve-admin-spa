angular.module("absolve.admin.catalog.item")
  .controller("CatalogItemShowController", [
    "$scope", "$routeParams", "catalogItemService", "breadcrumbsService",
    function($scope, $routeParams, catalogItemService, breadcrumbsService){
      $scope.catalogItem = false;
      var setCatalogItem = function(catalogItemData){
        $scope.catalogItem = catalogItemData;

        // make the damn breadcrumbs
        breadcrumbsService.pushBreadcrumb({
          text: "Catalogs",
          link: adminCatalogUrlBasePath
        });
        breadcrumbsService.pushObject(catalogItemData.catalog_set.catalog, adminCatalogUrlBasePath);
        breadcrumbsService.pushObject(catalogItemData.catalog_set, adminCatalogSetUrlBasePath);
        breadcrumbsService.pushObject(catalogItemData, adminCatalogItemUrlBasePath);
      };

      catalogItemService.show($routeParams.catalogItemId, setCatalogItem);

    }
  ]);
