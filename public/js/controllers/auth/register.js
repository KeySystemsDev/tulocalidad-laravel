// Declare use of strict javascript
'use strict';


app.controller('RegisterUsuarioController', function($scope, $log, ajax, $window) {
	$log.log('RegisterUsuarioController');

    $scope.pw = '';
    $scope.pw2 = '';

    $scope.error_email  = true;
    $scope.submit_email = false;
    var regex_email 	= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    var regex_pass  	= /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$/; 
    $scope.validar_email = function() {
    	if(!regex_email.test($scope.email)){
    		$scope.submit_email = true;
    		$scope.error_email  = true;
		}else{
			$scope.error_email  = false;
		};
    };

    $scope.error_pass1  = true;
    $scope.submit_pass1 = false;
    $scope.error_pass2  = true;
    $scope.submit_pass2 = false;
    $scope.validar_pass1 = function() {
    	$scope.submit_pass1 = true;
    	$scope.error_pass1  = false;
    	if(!regex_pass.test($scope.pw)){
    		$scope.msj_error_pass1  = "La contraseña debe tener contener minimo 8 caracteres entre digitos y letras";
    		$scope.error_pass1  = true;
    	};
    	if($scope.pw != $scope.pw2 && $scope.submit_pass2 && $scope.submit_pass1 ){
    		$scope.msj_error_pass2  = "Las contraseñas no coinciden.";
    		$scope.error_pass2  = true;
    	};
    };

    
    $scope.validar_pass2 = function() {
    	$scope.submit_pass2 = true;
    	$scope.error_pass2  = false;
    	if(!regex_pass.test($scope.pw2)){
    		$scope.msj_error_pass2 = "La contraseña debe tener contener minimo 8 caracteres entre digitos y letras";
    		$scope.error_pass2  = true;
    	};
		if($scope.pw != $scope.pw2 && $scope.submit_pass2 && $scope.submit_pass1 ){
    		$scope.msj_error_pass2 = "Las contraseñas no coinciden.";
    		$scope.error_pass2  = true;
    	}
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
