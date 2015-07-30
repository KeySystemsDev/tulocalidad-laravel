// Declare use of strict javascript
'use strict';


app.controller('LoginController', function($scope, $log, ajax, $window) {
	$log.log('LoginController');

	$scope.checkMe = function(){
    	var data = {};
    	// TRANSFORMANDO UN FORM A UN JSON
    	angular.element('#form').serializeArray().map(function(x){data[x.name] = x.value;});
	    ajax.Post("/auth/login", data ).$promise.then(
            function(data) {
    	    	$scope.titulo = "Login"
                if (data.success){
                	console.log("correcto");
                	$scope.mensaje 		= data.mensaje;
                	$window.location.href= "/mis-empresas";            
                }else{
                	console.log("incorrecto");
                	$scope.mensaje = data.mensaje;
                    $scope.redirecto = function() {
                    }
                    angular.element("#validacion_modal").modal("show");
                }
	        },
            //error (400,500)
            function(data) {
                $scope.titulo = "Error (7773)";
                $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                $scope.redirecto = function() {
                    $window.location.href = "/auth/login"; 
                } 
                angular.element("#validacion_modal").modal("show");
            });
	};
});