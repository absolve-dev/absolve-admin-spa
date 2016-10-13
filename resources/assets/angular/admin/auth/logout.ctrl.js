angular.module("absolve.admin.auth")
  .controller("AuthLogoutController", [
    "$scope", "$routeParams", "authService",
    function($scope, $routeParams, authService){
      $scope.submitLogout = function(){
        authService.logout();
      };
    }
  ]);
