angular.module("absolve.admin.inventory.listing.table")
  .directive("inventoryListingTable", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryListingTableHtmlBasePath + "table.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryListingTableController"
    };
  });
