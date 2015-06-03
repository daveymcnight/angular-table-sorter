/**
 * Created by McDavis on 4/17/15.
 */
var rdocModule = angular.module('patients',[]);

rdocModule.controller('patientsController', ['$scope','$http', function($scope, $http) {
    $scope.sample = function () {
        $http.get("../../resources/patients.php?sample=true")
            .success(function(response) {$scope.rows = response;});
    }
    $scope.submit = function(){
        var param = "wildcard=" + $scope.patientInput;
        $http.get("../../resources/patients.php?" + param)
            .success(function(response) {$scope.rows = response;});
    }
}]);