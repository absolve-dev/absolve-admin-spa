angular.module("absolve.admin.catalog").config(function($routeProvider) {
  $routeProvider
    .when(adminCatalogUrlBasePath, {
      templateUrl: adminCatalogHtmlBasePath + "index.tpl.html",
      controller: "CatalogIndexController"
    }).when(adminCatalogUrlBasePath + ":catalogId", {
      templateUrl: adminCatalogHtmlBasePath + "show.tpl.html",
      controller: "CatalogShowController"
    });
});
