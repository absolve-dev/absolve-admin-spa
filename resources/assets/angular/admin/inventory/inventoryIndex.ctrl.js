angular.module("absolve.admin.inventory")
  .controller("InventoryIndexController", [
    "$scope", "inventoryService", "breadcrumbsService",
    function($scope, inventoryService, breadcrumbsService){
      $scope.inventories = false;
      var setInventories = function(inventoriesData){
        $scope.inventories = inventoriesData;
      };

      inventoryService.index(setInventories);

      // make these juicy breadcrumbs
      breadcrumbsService.pushBreadcrumb({
        text: "Inventories",
        link: adminInventoryUrlBasePath
      });
    }
  ]);
