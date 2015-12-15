angular.module('app.controllers')
    .controller('ProjectListController', ['$scope', 'Project',function($scope, Project){

        $scope.projects = Project.query();
        console.log("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-");
        console.log("=             PROJECT'S             =");
        console.log("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-");
    }]);