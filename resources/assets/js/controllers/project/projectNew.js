angular.module('app.controllers').controller('ProjectNewController', [
    '$scope', '$location', '$cookies','Project', 'Client', 'appConfig',
    function($scope, $location, $cookies, Project, Client, appConfig){

        $scope.project = new Project();
        $scope.status = appConfig.project.status;

        $scope.due_date = {
            status: {
                opened: false
            }
        };

        $scope.open = function($event){
            console.log('aaa');
            $scope.due_date.status.opened = true;
        };

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