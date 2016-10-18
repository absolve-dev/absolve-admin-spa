angular.module("absolve.admin.auth")
  .controller("AuthLogoutController", [
    "$scope", "$location", "authService",
    function($scope, $location, authService){
      $scope.submitLogout = function(){
        authService.logout();
        $location.url("auth/login");
      };
    }
  ]);
