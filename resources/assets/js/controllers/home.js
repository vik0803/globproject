angular.module('app.controllers')
    .controller('HomeController', ['$scope', '$cookies', function($scope, $cookies){
        console.log('-----------------------');
        console.log('-  E-mail');
        console.log('-----------------------');
        console.log($cookies.getObject('user').email);
    }]);