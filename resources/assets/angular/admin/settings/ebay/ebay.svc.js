angular.module("absolve.admin.settings.ebay")
  .service("settingsEbayService", [
    "$http",
    function($http){
    // returns "this"
    this.get = function(successCallback){
      successCallback({auth_token:"hello"});
    };
    this.save = function(ebaySettingsData, successCallback){
      successCallback();
    };
  }]);
