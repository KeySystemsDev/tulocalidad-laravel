'use stric'


coreApp.controller('ClienteEmpresa', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteEmpresa");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;
})