angular.module("absolve.admin.auth")
  .directive("adminAuthNavbar", function($location){
    return {
      restrict: "A",
      templateUrl: adminAuthHtmlBasePath + "navbar.tpl.html",
      link: function(scope, element, attrs){

      },
      controller: "AdminAuthNavbarController"
    };
  });
