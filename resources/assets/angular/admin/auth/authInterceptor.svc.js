angular.module("absolve.admin.auth")
  .service("adminAuthInterceptor", [
    "localStorageService",
    "$location",
    function(localStorageService, $location){
      this.request = function(config){
        // dump the damn token in here if we out here fam
        if(localStorageService.get("token")){
          if(!config.headers){
            config.headers = {};
          }
          config.headers["auth-token"] = localStorageService.get("token");
        }
        return config;
      };
      this.responseError = function(response){
        // wipe the damn token if its a 401 auth fail
        console.log(response.status);
        if(response.status == 401){
          localStorageService.remove("token");
          $location.url("auth/login");
        }
      };
    }
]);
angular.module("absolve").config(["$httpProvider", function($httpProvider){
  $httpProvider.interceptors.push("adminAuthInterceptor");
}]);
