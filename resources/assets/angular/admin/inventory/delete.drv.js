angular.module("absolve.admin.inventory")
  .directive("inventoryDelete", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryHtmlBasePath + "delete.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryDeleteController"
    };
  });
