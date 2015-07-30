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

	$scope.checkMe = function(){
    	var data = {};
    	// TRANSFORMANDO UN FORM A UN JSON
    	angular.element('#form').serializeArray().map(function(x){data[x.name] = x.value;});
	    ajax.Post("/auth/register", data ).$promise.then(function(data) {
	    	$scope.titulo = "Registro"
            if (data.success){
            	$scope.mensaje 		= data.mensaje;
                $scope.redirecto = function() {
                    $window.location.href= "/auth/login"; 
                }                
            	angular.element("#validacion_modal").modal("show");
                
            }else{
            	$scope.mensaje = data.mensaje;
                $scope.redirecto = function() {
                    $window.location.href= "#"; 
                }
            	angular.element("#validacion_modal").modal("show");
            }
	    });
	}
});