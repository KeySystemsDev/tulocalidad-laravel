'use stric'

coreApp.controller('SolicitudesController', function($scope, $log, ajax, $window, $http, $rootScope) {
    console.log("SolicitudesController");    
    
    $scope.pagoInfo = function(item){
        $rootScope.urlAction = $scope.url + 'empresas/' + item.id_empresa + '/solicitudes/' + item.id_solicitud + '/responder-presupuesto';
        $rootScope.urlRedirect = $scope.url + 'empresas/' + item.id_empresa + '/solicitudes/';
    }

    $scope.servicio = {};

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