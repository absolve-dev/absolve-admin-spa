angular.module("absolve.admin.catalog.set")
  .directive("inventorySetCreateFromCatalogSet", function(){
    return {
      restrict: "E",
      templateUrl: adminCatalogSetHtmlBasePath + "createInventorySet.tpl.html",
      link: function(scope, element, attrs){
      },
      controller: "InventorySetCreateFromCatalogSetController"
    };
  });
