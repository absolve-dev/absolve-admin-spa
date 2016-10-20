angular.module("absolve.admin.inventory.set")
  .controller("InventorySetShowController", [
    "$scope", "$routeParams", "inventorySetService", "breadcrumbsService",
    function($scope, $routeParams, inventorySetService, breadcrumbsService){
      $scope.inventorySet = false;
      var setInventorySet = function(inventorySetData){
        $scope.inventorySet = inventorySetData;

        // make these juicy breadcrumbs
        breadcrumbsService.pushBreadcrumb({
          text: "Inventories",
          link: adminInventoryUrlBasePath
        });
        breadcrumbsService.pushObject(inventorySetData.inventory, adminInventoryUrlBasePath);
        breadcrumbsService.pushObject(inventorySetData, adminInventorySetUrlBasePath);
      };

      inventorySetService.show($routeParams.inventorySetId, setInventorySet);

    }
  ]);
