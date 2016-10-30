angular.module("absolve.admin.settings.ebay.auth")
  .service("settingsEbayAuthService", [
    "$http",
    function($http){
      this.getAuthUrl = function(successCallback){
        $http.get("/api/v1/settings/ebay/auth/url")
          .then(function(successResponse){
            successCallback(successResponse.data);
          }, function(failureResponse){
            // nada
          });
      };
      this.getAuthAccept = function(){
        // tap tap
        $http.get("/api/v1/settings/ebay/auth/accept");
      };
  }]);
