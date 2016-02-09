angular.module('app.controllers')
    .controller('ProjectFileNewController', [
        '$scope', '$location', '$routeParams', 'Upload',
        function($scope, $location, $routeParams, Upload){

            $scope.projectFile = {
                project_id: $routeParams.id
            };

            $scope.save = function(){
                if ($scope.formProjectFile.$valid) {

                    Upload.upload({
                        url: 'upload/url',
                        fields: {
                            'name': $scope.projectFile.name,
                            'description': $scope.projectFile.description
                        },
                        file: $scope.projectFile.file
                    }).success(function (data, status, headers, config) {
                        console.log('file ' + config.file.name + 'uploaded. Response: ' + data);
                        $location.path('/project/'+$routeParams.id+'/files');
                    });
                }
            }
        }
    ]);