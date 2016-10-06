angular.module("absolve.admin.auth")
  .controller("AuthSignupController", [
    "$scope", "$routeParams", "$location", "authService",
    function($scope, $routeParams, $location, authService){
      if(authService.loggedIn()){
        $location.url("/");
      }
      $scope.name = "";
      $scope.email = "";
      $scope.password = "";
      $scope.submitSignup = function(){
        authService.signup({
          name: $scope.name,
          email: $scope.email,
          password: $scope.password
        }, function(){
          // success callback
          $location.url("/");
        });
      };
    }
  ]);
