'use stric'


coreApp.controller('ComprarController', function($scope, $log, ajax, $window, $http) {
    console.log("ComprarController");    

    $scope.pagoInfo = function(item){
        $scope.id_empresa = item;
    }

    $scope.check = 0;
})

;