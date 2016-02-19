'use stric'

coreApp.controller('ClienteServicioDetalle', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteServicioDetalle");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;
});
