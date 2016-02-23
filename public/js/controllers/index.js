'use stric'

coreApp.controller('IndexController', function($scope, $log, ajax, $window, $http) {
    console.log("IndexController");    

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