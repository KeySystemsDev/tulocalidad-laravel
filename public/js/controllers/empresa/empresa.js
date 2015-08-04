// Declare use of strict javascript
'use strict';

app.controller('MisEmpresasController', function($scope, $log) {
    $log.log('MisEmpresasController');
    $scope.formData = {};
	$scope.paginacionhref="";

    $scope.deshabilitar = function(id){
        console.log("deshabilitando");
        $scope.titulo = "Confirmación";
        $scope.mensaje = "¿Esta seguro que desea eliminar su empresa y todas las publicidades asociadas? ";
        $scope.href =  "/mis-empresas/deshabilitar/" + id;
        angular.element("#ModalConfimacion").modal('show');
    }
});
