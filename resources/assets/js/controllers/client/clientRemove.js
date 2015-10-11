angular.module('app.controllers')
    .controller('ClientRemoveController', [
        '$scope', '$location', '$routeParams','Client',
        function($scope, $location, $routeParams, Client){

        $scope.client = Client.get({
            id: $routeParams.id
        });

        $scope.remove = function(){

            console.log("Remover");

            $scope.client.$delete().then(function(){

                console.log("--- Remover");

                $location.path('/clients');
            });
        }

    }]);