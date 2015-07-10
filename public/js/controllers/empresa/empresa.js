// Declare use of strict javascript
'use strict';

app.controller('MisEmpresasController', function($scope, $log) {
    $log.log('MisEmpresasController');
    $scope.formData = {};


    $scope.deshabilitar = function(id){
        console.log("deshabilitando");
        $scope.titulo = "Confirmación";
        $scope.mensaje = "¿Esta seguro que desea deshabilitar su empresa?";
        $scope.href =  "/mis-empresas/deshabilitar/" + id;
        angular.element("#ModalConfimacion").modal('show');
    }
});
