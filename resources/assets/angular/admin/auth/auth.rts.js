angular.module("absolve.admin.auth").config(function($routeProvider) {
  $routeProvider
    .when(adminAuthUrlBasePath + "signup", {
      templateUrl: adminAuthHtmlBasePath + "signup.tpl.html",
      controller: "AuthSignupController"
    }).when(adminAuthUrlBasePath + "login", {
      templateUrl: adminAuthHtmlBasePath + "login.tpl.html",
      controller: "AuthLoginController"
    }).when(adminAuthUrlBasePath + "logout", {
      templateUrl: adminAuthHtmlBasePath + "logout.tpl.html",
      controller: "AuthLogoutController"
    });
});
