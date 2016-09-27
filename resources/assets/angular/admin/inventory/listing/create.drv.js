angular.module("absolve.admin.inventory.listing")
  .directive("inventoryListingCreate", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryListingHtmlBasePath + "create.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryListingCreateController"
    };
  });
