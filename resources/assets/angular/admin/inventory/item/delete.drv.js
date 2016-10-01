angular.module("absolve.admin.inventory.item")
  .directive("inventoryItemDelete", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryItemHtmlBasePath + "delete.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryItemDeleteController"
    };
  });
