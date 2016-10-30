angular.module("absolve.admin.settings.ebay")
  .directive("ebayAuthLink",
    [
    function(){
      return {
        restrict: "E",
        templateUrl: adminSettingsEbayHtmlBasePath + "ebayAuthLink.tpl.html",
        link: function(scope, element, attrs){
        },
        controller: "SettingsEbayAuthLinkController"
      };
    }]);
