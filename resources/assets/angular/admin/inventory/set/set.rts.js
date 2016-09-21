angular.module("absolve.admin.inventory.set").config(function($routeProvider) {
  $routeProvider
    .when(adminInventorySetUrlBasePath + ":inventorySetId", {
      templateUrl: adminInventorySetHtmlBasePath + "show.tpl.html",
      controller: "InventorySetShowController"
    });
});
