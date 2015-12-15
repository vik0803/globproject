angular.module('app.controllers').controller('ProjectEditController', [
    '$scope', '$location', '$cookies', '$routeParams','Project', 'Client', 'User', 'appConfig',
    function($scope, $location, $cookies, $routeParams, Project, Client, User, appConfig){

        $scope.project = Project.get({
            id: $routeParams.id
        });

        $scope.clients = Client.query();
        $scope.status = appConfig.project.status;

        $scope.save = function(){

            if ($scope.formProject.$valid)
            {
                console.log("---------------------------------");
                console.log("-     Válido o formulário       -");
                console.log("---------------------------------");
                $scope.project.owner_id = $cookies.getObject('user').id;
                Project.update({
                        id: $scope.project.id
                    },
                    $scope.project,
                    function(){
                        $location.path('/projects');
                });
            }
            else
            {
                console.log("---------------------------------");
                console.log("-     Não válido o formulário   -");
                console.log("---------------------------------");
            }
        }
    }
]);