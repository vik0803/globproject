angular.module('app.controllers').controller('ProjectEditController', [
    '$scope', '$location', '$cookies', '$routeParams','Project', 'Client', 'User', 'appConfig',
    function($scope, $location, $cookies, $routeParams, Project, Client, User, appConfig){

        Project.get({
            id: $routeParams.id
        }, function(data){
            $scope.project = data;
            $scope.clientSelected = data.client.data;
        });

        $scope.status = appConfig.project.status;

        $scope.due_date = {
            status: {
                opened: false
            }
        };

        $scope.open = function($event){
            $scope.due_date.status.opened = true;
        };

        $scope.save = function(){

            if ($scope.formProject.$valid)
            {
                console.log("---------------------------------");
                console.log("-     Válido o formulário       -");
                console.log("---------------------------------");
                console.log($scope.project.id);
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
        };

        /**
         *
         * @param id
         * @returns {*}
         */
        $scope.formatName = function(model){
            if (model) {
                return model.name;
            }
            return '';
        };


        /**
         *
         * @param name
         * @returns {*}
         */
        $scope.getClients = function(name) {
            return Client.query({
                search: name,
                searchFields: 'name:like'
            }).$promise;
        };

        /**
         *
         * @param item
         */
        $scope.selectClient = function(item){
            $scope.project.client_id = item.id;
        };
    }
]);