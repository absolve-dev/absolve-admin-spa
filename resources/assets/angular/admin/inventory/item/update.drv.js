angular.module("absolve.admin.inventory.item")
  .directive("inventoryItemUpdate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryItemHtmlBasePath + "update.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryItemUpdateController"
    };
  });
