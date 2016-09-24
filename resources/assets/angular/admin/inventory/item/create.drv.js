angular.module("absolve.admin.inventory.item")
  .directive("inventoryItemCreate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryItemHtmlBasePath + "create.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryItemCreateController"
    };
  });
