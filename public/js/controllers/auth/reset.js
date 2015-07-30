// Declare use of strict javascript
'use strict';


app.controller('ResetContraseñaController', function($scope, $log, ajax, $window) {
	$log.log('ResetContraseñaController');

    $scope.pw = '';
    $scope.pw2 = '';
    var regex_pass  	= /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$/; 
    
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

        if($scope.pw == $scope.pw_old){
            $scope.msj_error_pass1  = "La nueva contraseña no debe ser igual a su antigua contraseña.";
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
    	angular.element('#formulario').serializeArray().map(function(x){data[x.name] = x.value;});
	    ajax.Post("/perfil/post-cambiar-password", data ).$promise.then(
            function(data) {
    	    	$scope.titulo = "Cambio de contraseña"
                if (data.success){
                	$scope.mensaje 	 = data.mensaje;
                    $scope.redirecto = function() {
                        $window.location.href= "/servicios"; 
                    }                
                }else{
                    $scope.titulo    = "Disculpe!";
                	$scope.mensaje   = data.mensaje;
                    $scope.redirecto = function() {
                        if (data.data.logout){
                            $window.location.href= "/perfil/cerrar"; 
                        }
                    }
                }
                angular.element("#validacion_modal").modal("show");
    	    },
            //error (400,500)
            function(data) {
                $scope.titulo = "Error (7772)";
                $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                $scope.redirecto = function() {
                    $window.location.href = "/perfil/cambiar-password"; 
                } 
                angular.element("#validacion_modal").modal("show");
            });
	}
});