angular.module("absolve.admin.settings.ebay").config(function($routeProvider) {
  $routeProvider.when(adminSettingsEbayUrlBasePath, {
    templateUrl: adminSettingsEbayHtmlBasePath + "ebay.tpl.html",
    controller: "SettingsEbayController"
  });
});
