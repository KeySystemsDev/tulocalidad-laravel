'use stric'


coreApp.controller('ClienteProducto', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteProducto");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;
})

coreApp.controller('ClienteProductoDetalle', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteProductoDetalle");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;
});
