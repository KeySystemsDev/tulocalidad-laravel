'use stric'

coreApp.controller('ContratoController', function($scope, $log, ajax, $window, $http, $rootScope) {
    console.log("ContratoController");    
    
    $scope.aceptar_presupuesto = function(item){
    	console.log(item);
        $rootScope.urlAction = $scope.url + 'empresas/' + item.id_empresa + '/solicitudes/' + item.id_solicitud + '/aceptar-presupuesto';
        $rootScope.urlRedirect = $scope.url + 'contratos';
    }

    $scope.retrazar_presupuesto = function(item){
    	console.log(item);
        $rootScope.urlAction = $scope.url + 'empresas/' + item.id_empresa + '/solicitudes/' + item.id_solicitud + '/rechazar-presupuesto';
        $rootScope.urlRedirect = $scope.url + 'contratos';
    }

    $scope.servicio = {};
    $scope.check = 0;

    $scope.submit= function(formValid) {
		console.log(formValid);
		$scope.submitted=true;
		if (formValid==true){
	        var json = {};
    		angular.element('#formulario').serializeArray().map(function(x){json[x.name] = x.value;});

			$http({
			    method: 'POST',
			    url: $rootScope.urlAction,
			    data: json,
			    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).then(function successCallback(response) {
				console.log(response);
			    $window.location.href = $rootScope.urlRedirect;
			  }, function errorCallback(response) {
			  	console.log("error");
			  	//$window.location.href = $scope.urlRedirect;
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			  });    		
		};
		return false;
	}

})

;