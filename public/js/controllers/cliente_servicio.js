'use stric'

coreApp.controller('ClienteServicioDetalle', function($scope, $log, ajax, $window, $http, $rootScope) {
    console.log("ClienteServicioDetalle");    

    $scope.modalInfo = function(item){
        $rootScope.urlAction = $scope.url + 'empresas/' + item.id_empresa + '/solicitudes';
        $scope.servicio = item;
    }

    $scope.letterLimit = 10;

    $scope.servicio  = {};

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

    $scope.submit= function(formValid) {
        console.log(formValid);
        $scope.submitted=true;
        if (formValid==true){
            var json = {};
            angular.element('#formulario').serializeArray().map(function(x){json[x.name] = x.value;});

            $http({
                method: 'POST',
                url: $rootScope.urlAction,
                data: json,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function successCallback(response) {
                console.log(response);
                $window.location.href = $scope.urlRedirect;
              }, function errorCallback(response) {
                console.log("error");
                //$window.location.href = $scope.urlRedirect;
                // called asynchronously if an error occurs
                // or server returns response with an error status.
              });           
        };
        return false;
    }
});
