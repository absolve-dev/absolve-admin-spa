angular.module("absolve.admin.inventory.set")
  .directive("inventorySetDelete", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventorySetHtmlBasePath + "delete.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventorySetDeleteController"
    };
  });
