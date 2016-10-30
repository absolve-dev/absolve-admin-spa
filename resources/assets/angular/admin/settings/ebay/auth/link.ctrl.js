angular.module("absolve.admin.settings.ebay.auth")
  .controller("SettingsEbayAuthLinkController", [
    "$scope", "settingsEbayAuthService",
    function($scope, settingsEbayAuthService){
      $scope.authUrl = null;
      var setAuthUrl = function(authUrl){
        $scope.authUrl = authUrl;
      };

      $scope.getAuthUrl = function(){
        settingsEbayService.getAuthUrl(setAuthUrl);
      };
    }
  ]);
