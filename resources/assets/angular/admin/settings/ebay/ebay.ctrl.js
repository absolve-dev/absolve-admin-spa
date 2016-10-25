angular.module("absolve.admin.settings.ebay")
  .controller("SettingsEbayController", [
    "settingsEbayService", "breadcrumbsService",
    function(settingsEbayService, breadcrumbsService){
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
