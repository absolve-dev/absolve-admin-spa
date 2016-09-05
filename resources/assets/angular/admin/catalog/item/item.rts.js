angular.module("absolve.admin.catalog.item").config(function($routeProvider) {
  $routeProvider
    .when(adminCatalogItemUrlBasePath + ":catalogItemId", {
      templateUrl: adminCatalogItemHtmlBasePath + "show.tpl.html",
      controller: "CatalogItemShowController"
    });
});
