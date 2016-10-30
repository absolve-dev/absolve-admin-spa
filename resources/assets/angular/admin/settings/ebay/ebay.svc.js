angular.module("absolve.admin.settings.ebay")
  .service("settingsEbayService", [
    "$http",
    function($http){
    // returns "this"
    this.get = function(successCallback){
      $http.get("/api/v1/settings/ebay")
        .then(function(successResponse){
          successCallback(successResponse.data);
        }, function(failureResponse){
          // nada
        });
    };
    this.save = function(ebaySettingsData, successCallback){
      $http.post("/api/v1/settings/ebay/update", {
        auth_token: ebaySettingsData.auth_token
      }).then(function(successResponse){
        successCallback(successResponse.data);
      }, function(failureResponse){
        // nada
      });
    };
  }]);
