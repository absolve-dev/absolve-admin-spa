angular.module("absolve.admin.inventory.listing.table")
  .directive("inventoryListingTableCrud", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryListingTableHtmlBasePath + "crud.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryListingTableCrudController"
    };
  });
