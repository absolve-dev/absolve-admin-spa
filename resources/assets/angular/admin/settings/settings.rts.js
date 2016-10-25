angular.module("absolve.admin.settings").config(function($routeProvider) {
  $routeProvider.when(adminSettingsUrlBasePath, {
    templateUrl: adminSettingsHtmlBasePath + "index.tpl.html"
  });
});
