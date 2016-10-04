angular.module("absolve.admin.catalog")
  .directive("inventoryCreateFromCatalog", function(){
    return {
      restrict: "E",
      templateUrl: adminCatalogHtmlBasePath + "createInventory.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventoryCreateFromCatalogController"
    };
  });
