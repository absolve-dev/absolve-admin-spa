angular.module("absolve.admin").config(function($routeProvider) {
  $routeProvider.when(adminUrlBasePath, {
    templateUrl: adminHtmlBasePath + "index.tpl.html"
  });
});
