angular.module("absolve.admin.inventory")
  .directive("inventoryUpdate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryHtmlBasePath + "update.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryUpdateController"
    };
  });
