'use stric'


coreApp.controller('ClienteProducto', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteProducto");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;
});