angular.module("absolve.admin.inventory.listing.table")
  .directive("inventoryListingTableRow", function($location){
    return {
      restrict: "E",
      templateUrl: adminInventoryListingTableHtmlBasePath + "row.tpl.html",
      scope: { listingRow: "=" },
      link: function(scope, element, attrs){
      },
      controller: "InventoryListingTableRowController"
    };
  });
