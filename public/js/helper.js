// Declare use of strict javascript
'use strict';
	
coreApp.controller('SubmitController', function ($scope, $log, $http, $window) {
	console.log("submit Controller");
	$scope.submit= function(formValid) {
		console.log(formValid);
		$scope.submitted=true;
		if (formValid==true){
	        var json = {};
    		angular.element('#formulario').serializeArray().map(function(x){json[x.name] = x.value;});

			$http({
			    method: 'POST',
			    url: $scope.urlAction,
			    data: json,
			    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).then(function successCallback(response) {
				console.log(response);
			    $window.location.href = $scope.urlRedirect;
			  }, function errorCallback(response) {
			  	console.log("error");
			  	//$window.location.href = $scope.urlRedirect;
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			  });    		
		};
		return false;
	}
});