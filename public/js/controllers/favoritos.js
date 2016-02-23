'use stric'

coreApp.controller('FavoritosController', function($scope, $log, ajax, $window, $http) {
    console.log("FavoritosController");    

    $scope.eliminar_favorito = function(tipo_s,id_s){
        $http({
            method: 'POST',
            url: '/favoritos/eliminar',
            params:{ 'tipo': tipo_s, 'id': id_s}
        }).then(function successCallback(response) {
            $window.location.href = "/favoritos";
            
        }, function errorCallback(response) {
            alert("Error Conexión");
        });
    }
    
});