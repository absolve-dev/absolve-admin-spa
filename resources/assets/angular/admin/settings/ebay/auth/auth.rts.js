angular.module("absolve.admin.settings.ebay.auth").config(function($routeProvider) {
  $routeProvider.when(adminSettingsEbayAuthUrlBasePath + "accept", {
    templateUrl: adminSettingsEbayAuthHtmlBasePath + "accept.tpl.html",
    controller: "SettingsEbayAuthAcceptController"
  });
});
