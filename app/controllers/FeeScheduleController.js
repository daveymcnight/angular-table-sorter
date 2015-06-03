/* FEE SCHEDULE CONTROLLER */

var feeScheduleModule = angular.module('feeSchedule',[]);
feeScheduleModule.controller('feeScheduleController', ['$scope','$http', function($scope, $http) {

    $scope.sample = function () {
        $http.get("/tables/fee-schedule/fee-schedule-table.php?sample=true")
            .success(function(response) {$scope.rows = response;});
    }

    $scope.companySelectBox = function (){
        $http.get("/tables/fee-schedule/fee-schedule-table.php?col=insurancecomp")
            .success(function(response) {$scope.companies =response;});
    }

    $scope.submit = function(){

        var input = $scope.feeScheduleInput;
        var top = $scope.feeScheduleTop50;
        var exam = $scope.feeScheduleExam;

        $http.get("/tables/fee-schedule/fee-schedule-table.php", {
            params:{
                wildcard:input,
                top50: top,
                exam: exam
            }
        })
            .success(function(response) {$scope.rows = response;});
    }
}]);