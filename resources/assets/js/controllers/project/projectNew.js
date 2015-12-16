angular.module('app.controllers').controller('ProjectNewController', [
    '$scope', '$location', '$cookies','Project', 'Client', 'appConfig',
    function($scope, $location, $cookies, Project, Client, appConfig){

        $scope.project = new Project();

        $scope.clients = Client.query();
        $scope.status = appConfig.project.status;

        /**
         *
         */
        $scope.save = function(){

            if ($scope.formProject.$valid) {
                $scope.project.owner_id = $cookies.getObject('user').id;
                $scope.project.$save().then(function () {
                    $location.path('/projects');
                });
            }
        };

        /**
         *
         * @param id
         * @returns {*}
         */
        $scope.formatName = function(id){
            if (id) {
                for(var o in $scope.clients) {
                    if ($scope.clients[o].id == id) {
                        return $scope.clients[o].name;
                    }
                }
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
    }
]);