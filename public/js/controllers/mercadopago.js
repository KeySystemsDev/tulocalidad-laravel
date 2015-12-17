'use stric'


coreApp.controller('MercadopagoContoller', function($scope, $log, ajax, $window, registro_service) {
    console.log('MercadopagoContoller');

    Mercadopago.setPublishableKey("TEST-1ad5eb5c-c644-4824-b196-cb039d8321f6");
    Mercadopago.getIdentificationTypes();

    $scope.model  = {};

    $scope.submit =function(formulario) {
        console.log(formulario.submit())
    };

});