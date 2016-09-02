angular.module("absolve.admin.catalog.set").config(function($routeProvider) {
  $routeProvider
    .when(adminCatalogSetUrlBasePath + ":catalogSetId", {
      templateUrl: adminCatalogSetHtmlBasePath + "show.tpl.html",
      controller: "CatalogSetShowController"
    });
});
