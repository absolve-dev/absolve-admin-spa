angular.module("absolve.admin.auth")
  .controller("AuthLoginController", [
    "$scope", "$routeParams", "$location","authService",
    function($scope, $routeParams, $location, authService){
      if(authService.loggedIn()){
        $location.url("/");
      }
      $scope.email = "";
      $scope.password = "";
      $scope.submitLogin = function(){
        authService.login({
          email: $scope.email,
          password: $scope.password
        }, function(){
          // success callback
          $location.url("/");
        });
      };
    }
  ]);
