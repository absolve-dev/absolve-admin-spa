angular.module("absolve.admin.catalog.item")
  .directive("inventoryItemCreateFromCatalogItem", function(){
    return {
      restrict: "E",
      templateUrl: adminCatalogItemHtmlBasePath + "createInventoryItem.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryItemCreateFromCatalogItemController"
    };
  });
