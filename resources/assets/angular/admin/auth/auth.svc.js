angular.module("absolve.admin.auth")
  .service("authService",
  ["$http", "localStorageService",
  function($http, localStorageService){
    this.signup = function(signupData, successCallback){
      // signup data expects keys: name, email, password
      $http.post("/api/v1/auth/signup", {
        name: signupData.name,
        email: signupData.email,
        password: signupData.password
      }).then(function(successResponse){
        localStorageService.set("token", successResponse.data.token);
        successCallback(successResponse);
      }, function(failureResponse){
      });
    };
    this.login = function(loginData, successCallback){
      // login data expects keys: email, password
      $http.post("/api/v1/auth/login", {
        email: loginData.email,
        password: loginData.password
      }).then(function(successResponse){
        localStorageService.set("token", successResponse.data.token);
        successCallback(successResponse);
      }, function(failureResponse){
      });
    };
    this.logout = function(){
      localStorageService.remove("token");
    };
    this.getCurrentToken = function(){
      return localStorageService.get("token");
    }
    this.loggedIn = function(){
      if(localStorageService.get("token")){
        return true;
      }else{
        return false;
      }
    };
  }]);
