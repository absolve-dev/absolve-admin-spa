angular.module("absolve.admin.navbar")
  .directive("adminNavbar", function($location){
    return {
      restrict: "A",
      templateUrl: adminNavbarHtmlBasePath + "navbar.tpl.html",
      link: function(scope, element, attrs){
        scope.$on("$routeChangeSuccess", function(event, current, previous){
          var ngSplitPath = $location.path().split('/');
          scope.currentActiveTab = ngSplitPath[1];
        });
      },
      controller: function($scope){

      }
    };
  });
