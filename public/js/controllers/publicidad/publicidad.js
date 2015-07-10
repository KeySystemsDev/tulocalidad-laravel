// Declare use of strict javascript
'use strict';

app.controller('MisPublicidadesController', function($scope, $log) {
    $log.log('MisPublicidadController');
    $scope.formData = {};


    $scope.deshabilitar = function(id){
        console.log("deshabilitando");
        $scope.titulo = "Confirmación";
        $scope.mensaje = "¿Esta seguro que desea deshabilitar su publicidad?";
        $scope.href =  "/mis-publicidades/deshabilitar/" + id;
        angular.element("#ModalConfimacion").modal('show');
    };
});
