// Declare use of strict javascript
'use strict';


app.controller('ResetPasswordController', function($scope, $log, ajax, $window) {
    $log.log('ResetPasswordController');

    $scope.email = "";
    $scope.error_email  = true;
    $scope.submit_email = false;
    var regex_email     = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    $scope.validar_email = function() {
        console.log("ejecutando");
        if(!regex_email.test($scope.email)){
            $scope.submit_email = true;
            $scope.error_email  = true;
        }else{
            $scope.error_email  = false;
        };
    };

    $scope.hrefPost = "#";
    $scope.hrefSuccess = "#";
    $scope.hrefFailed = "#";
    $scope.hrefErrorServer = "#";
    $scope.checkMe = function(){
        var data = {};
        // TRANSFORMANDO UN FORM A UN JSON
        angular.element('#form').serializeArray().map(function(x){data[x.name] = x.value;});
        ajax.Post($scope.hrefPost, data ).$promise.then(
            function(data) {
                $scope.titulo     = data.data.titulo;
                $scope.mensaje    = data.mensaje;

                if (data.success){
                    $scope.redirecto = function() {
                        $window.location.href= $scope.hrefSuccess; 
                    }                
                }else if (!data.success){
                    $scope.redirecto = function() {
                        $window.location.href= $scope.hrefFailed; 
                    }
                }else{
                    $scope.titulo = "Error (7772)";
                    $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                    $scope.redirecto = function() {
                        $window.location.href = $scope.hrefErrorServer; 
                    }
                }
                angular.element("#validacion_modal").modal("show");
            },
            //error (400,500)
            function(data) {
                $scope.titulo = "Error (7772)";
                $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                $scope.redirecto = function() {
                    $window.location.href = $scope.hrefErrorServer; 
                } 
                angular.element("#validacion_modal").modal("show");
            });
    }
});
