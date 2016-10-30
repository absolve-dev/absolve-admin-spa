angular.module("absolve.admin.settings.ebay.auth")
  .directive("ebayAuthLink",
    [
    function(){
      return {
        restrict: "E",
        templateUrl: adminSettingsEbayAuthHtmlBasePath + "link.tpl.html",
        link: function(scope, element, attrs){
        },
        controller: "SettingsEbayAuthLinkController"
      };
    }]);
