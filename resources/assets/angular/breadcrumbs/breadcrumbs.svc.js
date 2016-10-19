angular.module("absolve.breadcrumbs")
  .service("breadcrumbsService",
  ["$rootScope",
  function($rootScope){
    var breadcrumbs = [];

    // push breadcrumbs onto set
    this.pushBreadcrumb = function(breadcrumbData){
      // check if the breadcrumb has a name and link, reject if not
      if(breadcrumbData.text && breadcrumbData.link){
        breadcrumbData.link = "#" + breadcrumbData.link;
        breadcrumbs.push(breadcrumbData);
        console.log("i to push bread", this.getBreadcrumbs());
      }
    };
    this.initBreadcrumbs = function(){
      updateBreadcrumbs();
    };
    this.getBreadcrumbs = function(){
      return breadcrumbs;
    };
    this.clearBreadcrumbs = function(){
      breadcrumbs = [];
      updateBreadcrumbs();
      console.log("i like to clear bread", this.getBreadcrumbs());
    };

    function updateBreadcrumbs(){
      $rootScope.$emit("updateBreadcrumbs", breadcrumbs);
    }
  }]);

angular.module("absolve.breadcrumbs").run([
  "$rootScope", "breadcrumbsService",
  function($rootScope, breadcrumbsService){
    $rootScope.$on("$routeChangeSuccess", function(event, current, previous){
      breadcrumbsService.clearBreadcrumbs();
      /*
      // breadcrumb example code, i guess
      $.each([
        {text:"i", link: "/"},
        {text:"woke", link: "/"},
        {text:"up", link: "/"},
        {text:"like", link: "/"},
        {text:"this", link: "/"}
      ], function(index, value){
        breadcrumbsService.pushBreadcrumb(value);
      });
      breadcrumbsService.initBreadcrumbs();
      */
    });
}]);
