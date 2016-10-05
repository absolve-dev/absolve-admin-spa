angular.module("absolve.admin.auth").config(function($routeProvider) {
  $routeProvider
    .when(adminAuthUrlBasePath + "login", {
      templateUrl: adminAuthHtmlBasePath + "login.tpl.html",
      controller: "AuthLoginController"
    }).when(adminAuthUrlBasePath + "signup", {
      templateUrl: adminAuthHtmlBasePath + "signup.tpl.html",
      controller: "AuthSignupController"
    });
});
