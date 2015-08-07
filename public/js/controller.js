// Declare use of strict javascript
'use strict';

app.controller('RifController', function($scope, $log) {
	$log.log('RifController');
})

app.controller('PublicidadController', function($scope, $log) {
    $log.log('PublicidadController');
    $scope.formData = {};
})

app.controller('DetalleEmpresaController', function($scope, $log) {
    $log.log('DetalleEmpresaController');
    $scope.options = {scrollwheel: false};
});
