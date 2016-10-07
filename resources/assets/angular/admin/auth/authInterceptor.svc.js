angular.module("absolve.admin.auth")
  .service("adminAuthInterceptor", ["localStorageService", function(localStorageService){
    this.request = function(config){
      // dump the damn token in here if we out here fam
      if(localStorageService.get("token")){
        if(!config.params){
          config.params = {};
        }
        config.params.token = localStorageService.get("token");
      }
      return config;
    };
}]);
angular.module("absolve").config(["$httpProvider", function($httpProvider){
  $httpProvider.interceptors.push("adminAuthInterceptor");
}]);
