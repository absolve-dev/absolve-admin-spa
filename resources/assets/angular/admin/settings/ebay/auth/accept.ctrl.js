angular.module("absolve.admin.settings.ebay.auth")
  .controller("SettingsEbayAuthAcceptController", [
    "$scope", "$route", "settingsEbayAuthService", "breadcrumbsService",
    function($scope, $route, settingsEbayAuthService, breadcrumbsService){
      // initialize
      settingsEbayService.getAuthAccept();
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
