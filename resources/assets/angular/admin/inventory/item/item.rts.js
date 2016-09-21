angular.module("absolve.admin.inventory.item").config(function($routeProvider) {
  $routeProvider
    .when(adminInventoryItemUrlBasePath + ":inventoryItemId", {
      templateUrl: adminInventoryItemHtmlBasePath + "show.tpl.html",
      controller: "InventoryItemShowController"
    });
});
