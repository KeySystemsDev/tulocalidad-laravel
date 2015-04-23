// Declare use of strict javascript
'use strict';

angular.module('tulocalidad.controller', [])

.controller('WelcomeController', function($scope, $log) {
	$log.log('WelcomeController');
})

.controller('EmpresaController', function($scope, $log) {
	$log.log('EmpresaController');

	/* view /registro/ */

	/* view /registro/empresa */
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
          		$log.log('marker dragend');
          		var lat = marker.getPosition().lat();
          		var lon = marker.getPosition().lng();
          		$log.log(lat);
          		$log.log(lon);

          	$scope.marker.options = {
            	draggable: true,
            	labelContent: "lat: " + $scope.marker.coords.latitude + ' ' + 'lon: ' + $scope.marker.coords.longitude,
            	labelAnchor: "100 0",
            	labelClass: "marker-labels"
          };
        }
      }
    };
});
