angular.module("absolve.admin.inventory").config(function($routeProvider) {
  $routeProvider
    .when(adminInventoryUrlBasePath, {
      templateUrl: adminInventoryHtmlBasePath + "index.tpl.html",
      controller: "InventoryIndexController"
    }).when(adminInventoryUrlBasePath + ":inventoryId", {
      templateUrl: adminInventoryHtmlBasePath + "show.tpl.html",
      controller: "InventoryShowController"
    });
});
