angular.module("absolve.admin.inventory.set")
  .directive("inventorySetCreate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventorySetHtmlBasePath + "create.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventorySetCreateController"
    };
  });
