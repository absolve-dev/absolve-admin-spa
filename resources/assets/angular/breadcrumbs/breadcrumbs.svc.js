angular.module("absolve.breadcrumbs")
  .service("breadcrumbsService",
  ["$rootScope",
  function($rootScope){
    var breadcrumbs = [];

    // push breadcrumbs onto set
    this.pushBreadcrumb = function(breadcrumbData){
      // check if the breadcrumb has a text and link, reject if not
      if(breadcrumbData.text && breadcrumbData.link){
        // constrict links to SPA
        breadcrumbData.link = "#" + breadcrumbData.link;
        breadcrumbs.push(breadcrumbData);
        console.log("i to push bread", this.getBreadcrumbs());
      }
    };
    this.pushObject = function(objectData, basePath){
      // this shit expects a damn name and id, so turn that shit into a link
      // so fucking check for that shit
      // also require a base path to append the link to
      if(basePath && objectData.name && objectData.id){
        this.pushBreadcrumb({
          text: objectData.name,
          link: basePath + objectData.id
        });
      }
    }
    this.finishBreadcrumbs = function(){
      // in practice, there's no need to update the breadcrumbs again
      // because once this shit is cleared,
      // the array is passed by reference to the directive
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
