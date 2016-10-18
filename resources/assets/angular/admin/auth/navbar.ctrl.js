angular.module("absolve.admin.auth")
  .controller("AdminAuthNavbarController", [
    "$scope", "$location", "authService",
    function($scope, $location, authService){
      $scope.$on("$routeChangeSuccess", function(event, current, previous){
        $scope.loggedIn = authService.loggedIn();
        var ngSplitPath = $location.path().split('/');
        var currentActiveTab = ngSplitPath[1];
        if(currentActiveTab != "auth"){
          // if not an auth page
          if(!$scope.loggedIn){
            // if not logged in
            // make sure this nigga gets logged in
            $location.url("auth/login");
          }
        }
      });
    }
  ]);
