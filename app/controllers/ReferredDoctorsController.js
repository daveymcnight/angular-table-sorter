/* REFERRED DOCTOR CONTROLLER */

var rdocModule = angular.module('rdoc',[]);

rdocModule.controller('rdocController', ['$scope','$http', function($scope, $http) {
    $scope.sample = function () {
        $http.get("../../resources/rdoc.php?sample=true")
            .success(function(response) {$scope.rows = response;});
    }
    $scope.submit = function(){
        var param = "wildcard=" + $scope.rdocInput;
        $http.get("../../resources/rdoc.php?" + param)
            .success(function(response) {$scope.rows = response;});
    }
}]);
