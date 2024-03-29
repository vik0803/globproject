angular.module('app.controllers')
    .controller('ProjectNoteEditController', [
        '$scope', '$location', '$routeParams','ProjectNote',
        function($scope, $location, $routeParams, ProjectNote){

            $scope.projectNote = ProjectNote.get({
                id: $routeParams.id,
                idNote: $routeParams.idNote
            });

            $scope.save = function(){

                $scope.projectNote.project_id = $routeParams.id;
                console.log('-------------------------------');
                console.log($scope.projectNote);
                console.log('-------------------------------');

                if ($scope.formProjectNote.$valid) {
                    ProjectNote.update({
                        id: $scope.projectNote.project_id,
                        idNote: $scope.projectNote.id,
                    },
                    $scope.projectNote,
                    function(){
                        $location.path('/projects/'+$routeParams.id+'/notes');
                    });
                }
            }
        }
    ]);