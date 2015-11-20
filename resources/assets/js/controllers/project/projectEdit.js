angular.module('app.controllers').controller('ProjectEditController', [
    '$scope', '$location', '$routeParams','Project', 'Client', 'User',
    function($scope, $location, $routeParams, Project, Client, User){

        $scope.clientOptions = [];

        $scope.project = Project.get({
            id: $routeParams.id
        });

        $scope.clients = Client.query();

        $scope.save = function(){

            if ($scope.formProject.$valid) {
                Project.update({
                        id: $scope.project.id
                    },
                    $scope.project,
                    function(){
                        $location.path('/projects');
                });
            }
        }
    }
]);