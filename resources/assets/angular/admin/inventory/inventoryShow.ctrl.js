angular.module("absolve.admin.inventory")
  .controller("InventoryShowController", [
    "$scope", "$routeParams", "inventoryService", "breadcrumbsService",
    function($scope, $routeParams, inventoryService, breadcrumbsService){
      $scope.inventory = false;
      var setInventory = function(inventoryData){
        $scope.inventory = inventoryData;

        // make these juicy breadcrumbs
        breadcrumbsService.pushBreadcrumb({
          text: "Inventories",
          link: adminInventoryUrlBasePath
        });
        breadcrumbsService.pushObject(inventoryData, adminInventoryUrlBasePath);
      };

      inventoryService.show($routeParams.inventoryId, setInventory);

    }
  ]);
