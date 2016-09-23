angular.module("absolve.admin.inventory")
  .directive("inventoryCreate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryHtmlBasePath + "create.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryCreateController"
    };
  });
