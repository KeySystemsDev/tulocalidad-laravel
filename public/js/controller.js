// Declare use of strict javascript
'use strict';

angular.module('tulocalidad.controller', [])

.controller('WelcomeController', function($scope, $log) {
	$log.log('WelcomeController');
})

.controller('RifController', function($scope, $log) {
	$log.log('RifController');
})

.controller('EmpresaRegistroController', function($scope, $log, estados) {
	$log.log('EmpresaRegistroController');

	$scope.map = {center: {latitude: 10.4713637669733, longitude: -66.807892578125 }, zoom: 9 };
    $scope.options = {scrollwheel: false};
    $scope.coordsUpdates = 0;
    $scope.dynamicMoveCtr = 0;
    $scope.marker = {
      	id: 0,
      	coords: {
        	latitude: 10.4713637669733,
        	longitude: -66.807892578125
      	},
      	options: { draggable: true },
      	events: {
        	dragend: function (marker, eventName, args) {
          		$log.log('Cordenadas');
          		$scope.lat = marker.getPosition().lat();
          		$scope.lon = marker.getPosition().lng();
          		angular.element('#i_latitud').val($scope.lat);
          		angular.element('#i_longitud').val($scope.lon);
          		$log.log($scope.lat);
          		$log.log($scope.lon);

          	$scope.marker.options = {
            	draggable: true,
            	labelContent: "lat: " + $scope.marker.coords.latitude + ' ' + 
            				  "lon: " + $scope.marker.coords.longitude,
            	labelAnchor: "100 0",
            	labelClass: "marker-labels"
          };
        }
      }
    };

    $scope.estados = estados.get();
	
	$scope.estado_ruta = function(estado) {
       	$scope.array = estado.split('+');
   		
   		$scope.map = {center : { latitude: $scope.array[1], longitude: $scope.array[2] }};
   		$scope.marker = {
      	id: 0,
      	coords: {
        	latitude: $scope.array[1],
        	longitude: $scope.array[2]
      	},
      	options: { draggable: true },
      	events: {
        	dragend: function (marker, eventName, args) {
          		$log.log('Cordenadas');
          		$scope.lat = marker.getPosition().lat();
          		$scope.lon = marker.getPosition().lng();
          		angular.element('#i_latitud').val($scope.lat);
          		angular.element('#i_longitud').val($scope.lon);
          		$log.log($scope.lat);
          		$log.log($scope.lon);

          	$scope.marker.options = {
            	draggable: true,
            	labelContent: "lat: " + $scope.marker.coords.latitude + ' ' + 
            				  "lon: " + $scope.marker.coords.longitude,
            	labelAnchor: "100 0",
            	labelClass: "marker-labels"
          };
        }
      }
    };
    };
});
