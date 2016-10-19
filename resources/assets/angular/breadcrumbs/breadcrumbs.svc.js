angular.module("absolve.breadcrumbs")
  .service("breadcrumbsService",
  ["$rootScope",
  function($rootScope){
    var breadcrumbs = [];

    // push breadcrumbs onto set
    this.pushBreadcrumb = function(breadcrumbData){
      breadcrumbs.push(breadcrumbData);
      console.log("i to push bread", this.getBreadcrumbs());
    };
    this.finishBreadcrumbs = function(){
      $rootScope.$emit("updateBreadcrumbs", breadcrumbs);
    };
    this.getBreadcrumbs = function(){
      return breadcrumbs;
    };
    this.clearBreadcrumbs = function(){
      breadcrumbs = [];
      console.log("i like to clear bread", this.getBreadcrumbs());
    };
  }]);

angular.module("absolve.breadcrumbs").run([
  "$rootScope", "breadcrumbsService",
  function($rootScope, breadcrumbsService){
    $rootScope.$on("$routeChangeSuccess", function(event, current, previous){
      breadcrumbsService.clearBreadcrumbs();
      breadcrumbsService.pushBreadcrumb("i");
      breadcrumbsService.pushBreadcrumb("woke");
      breadcrumbsService.pushBreadcrumb("up");
      breadcrumbsService.pushBreadcrumb("like");
      breadcrumbsService.pushBreadcrumb("this");
      breadcrumbsService.finishBreadcrumbs();
    });
}]);
