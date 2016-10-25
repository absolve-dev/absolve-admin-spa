angular.module("absolve.admin.settings.ebay")
  .controller("SettingsEbayController", [
    "$scope", "$route", "settingsEbayService", "breadcrumbsService",
    function($scope, $route, settingsEbayService, breadcrumbsService){
      // initialize
      var setEbaySettings = function(ebaySettingsData){
        $scope.ebaySettings = ebaySettingsData;
      }
      settingsEbayService.get(setEbaySettings);

      $scope.submitSave = function(){
        // to be implemented
        settingsEbayService.save(
          $scope.ebaySettings,
          function(){
            // success callback
            $route.reload();
          });
      };

      // make the damn breadcrumbs
      breadcrumbsService.pushBreadcrumb({
        text: "Settings",
        link: adminSettingsUrlBasePath
      });
      breadcrumbsService.pushBreadcrumb({
        text: "eBay Settings",
        link: adminSettingsEbayUrlBasePath
      });
    }
  ]);
