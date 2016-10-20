angular.module("absolve.breadcrumbs")
  .directive("breadcrumbs", function($location){
    return {
      restrict: "A",
      templateUrl: breadcrumbsHtmlBasePath + "breadcrumbs.tpl.html",
      link: function(scope, element, attrs){
        
      },
      controller: "BreadcrumbsController"
    };
  });
