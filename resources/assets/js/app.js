var app = angular.module('app', ['ngRoute', 'angular-oauth2','app.controllers', 'app.services']);

angular.module('app.controllers', ['ngMessages', 'angular-oauth2']);
angular.module('app.services', ['ngResource']);


app.provider('appConfig', function(){
    var config = {
        baseUrl: 'http://localhost:8090'
    }

    return {
        config: config,
        $get: function(){
            return config;
        }
    }
});

app.config([
    '$routeProvider', '$httpProvider','OAuthProvider', 'OAuthTokenProvider', 'appConfigProvider',
    function($routeProvider, $httpProvider, OAuthProvider, OAuthTokenProvider, appConfigProvider){

        $httpProvider.defaults.transformResponse = function(data, headers) {
            var headersGetter = headers();

            if (headersGetter['content-type'] == 'application/json' || headersGetter['content-type'] == 'text/json') {
                var dataJson = JSON.parse(data);

                if (dataJson.hasOwnProperty('data')) {
                    dataJson = dataJson.data;
                }

                return dataJson;
            }
            
            return data;

        };

        $routeProvider
            .when('/login', {
                templateUrl: 'build/views/login.html',
                controller: 'LoginController'
            })
            .when('/home', {
                templateUrl: 'build/views/home.html',
                controller: 'HomeController'
            })
            .when('/clients', {
                templateUrl: 'build/views/client/list.html',
                controller: 'ClientListController'
            }).when('/clients/new', {
                templateUrl: 'build/views/client/new.html',
                controller: 'ClientNewController'
            }).when('/clients/:id/edit', {
                templateUrl: 'build/views/client/edit.html',
                controller: 'ClientEditController'
            }).when('/clients/:id/remove', {
                templateUrl: 'build/views/client/remove.html',
                controller: 'ClientRemoveController'
            });

        OAuthProvider.configure({
            baseUrl: appConfigProvider.config.baseUrl,
            clientId: 'appid',
            clientSecret: 'secret',
            grantPath: '/oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });

    }]);

app.run(['$rootScope', '$window', 'OAuth', function($rootScope, $window, OAuth) {
    $rootScope.$on('oauth:error', function (event, rejection) {
        if ('invalid_grant' === rejection.data.error) {
            return;
        }

        if ('invalid_token' === rejection.data.error) {
            return OAuth.getRefreshToken();
        }

        return $window.location.href = '/login?error_reason=' + rejection.data.error;
    });
}]);