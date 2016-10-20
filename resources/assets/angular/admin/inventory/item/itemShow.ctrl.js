angular.module("absolve.admin.inventory.item")
  .controller("InventoryItemShowController", [
    "$scope", "$routeParams", "inventoryItemService", "breadcrumbsService",
    function($scope, $routeParams, inventoryItemService, breadcrumbsService){
      $scope.inventoryItem = false;
      var setInventoryItem = function(inventoryItemData){
        $scope.inventoryItem = inventoryItemData;

        // make these juicy breadcrumbs
        breadcrumbsService.pushBreadcrumb({
          text: "Inventories",
          link: adminInventoryUrlBasePath
        });
        breadcrumbsService.pushObject(inventoryItemData.inventory_set.inventory, adminInventoryUrlBasePath);
        breadcrumbsService.pushObject(inventoryItemData.inventory_set, adminInventorySetUrlBasePath);
        breadcrumbsService.pushObject(inventoryItemData, adminInventoryItemUrlBasePath);
      };

      inventoryItemService.show($routeParams.inventoryItemId, setInventoryItem);

    }
  ]);
