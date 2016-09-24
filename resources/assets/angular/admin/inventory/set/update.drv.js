angular.module("absolve.admin.inventory.set")
  .directive("inventorySetUpdate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventorySetHtmlBasePath + "update.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventorySetUpdateController"
    };
  });
