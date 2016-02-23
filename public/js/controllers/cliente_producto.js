'use stric'


coreApp.controller('ClienteProducto', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteProducto");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;

    $scope.agregar_favorito = function(tipo_s,id_s){
        $http({
            method: 'POST',
            url: '/favoritos/agregar',
            params:{ 'tipo': tipo_s, 'id': id_s}
        }).then(function successCallback(response) {
            $window.location.href = "/favoritos";
            
        }, function errorCallback(response) {
            alert("Error Conexión");
        });
    }
})

coreApp.controller('ClienteProductoDetalle', function($scope, $log, ajax, $window, $http) {
    console.log("ClienteProductoDetalle");    

    $scope.modalInfo = function(item){
        $scope.producto = item;
    }

    $scope.letterLimit = 10;

    $scope.agregar_favorito = function(tipo_s,id_s){
        $http({
            method: 'POST',
            url: '/favoritos/agregar',
            params:{ 'tipo': tipo_s, 'id': id_s}
        }).then(function successCallback(response) {
            $window.location.href = "/favoritos";
            
        }, function errorCallback(response) {
            alert("Error Conexión");
        });
    }
});
