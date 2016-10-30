angular.module("absolve.admin.settings.ebay")
  .controller("SettingsEbayAuthLinkController", [
    "$scope", "settingsEbayService",
    function($scope, settingsEbayService){
      $scope.authUrl = null;
      var setAuthUrl = function(authUrl){
        $scope.authUrl = authUrl;
      };

      $scope.getAuthUrl = function(){
        settingsEbayService.getAuthUrl(setAuthUrl);
      };
    }
  ]);
