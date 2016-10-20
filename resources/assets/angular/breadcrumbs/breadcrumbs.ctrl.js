angular.module("absolve.breadcrumbs")
  .controller("BreadcrumbsController", [
    "$scope", "$rootScope", "breadcrumbsService",
    function($scope, $rootScope, breadcrumbsService){
      $scope.breadcrumbs = [];
      $rootScope.$on("updateBreadcrumbs", function(event, breadcrumbs){
        $scope.breadcrumbs = breadcrumbs;
        console.log("i like to on bread", breadcrumbs);
      });
    }
  ]);
