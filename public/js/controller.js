// Declare use of strict javascript
'use strict';


app.controller('WelcomeController', function($scope, $log, cfpLoadingBar, $timeout) {
	$log.log('WelcomeController');

    // fake the initial load so first time users can see it right away:
    cfpLoadingBar.start();
    $scope.fakeIntro = true;
    $timeout(function() {
      cfpLoadingBar.complete();
      $scope.fakeIntro = false;
    }, 1500);

    $(document).on('mousemove', function(e) {
    var x = e.pageX;
    var y = e.pageY;
    var w = $(this).width();
    var h = $(this).height();
    var angle = Math.atan2(y-(h/2), x-(w/2)) * (-180/Math.PI);
    var rotate = angle + (180-45);
    $('.button-intro .compass')
        .css('-webkit-transform', 'rotate('+rotate+'deg)')
        .css('-moz-transform', 'rotate('+rotate+'deg)')
        .css('-ms-transform', 'rotate('+rotate+'deg)')
        .css('-o-transform', 'rotate('+rotate+'deg)')
        .css('transform', 'rotate('+rotate+'deg)');
    console.log(rotate);
    });

})

app.controller('RifController', function($scope, $log) {
	$log.log('RifController');
})

app.controller('PublicidadController', function($scope, $log) {
    $log.log('PublicidadController');
    $scope.formData = {};
})

app.controller('EmpresaRegistroController', function($scope, $log, estados) {
	$log.log('EmpresaRegistroController');
    $scope.formData = {};
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
        angular.element('#id_estado').val($scope.array[0]);
        angular.element('#i_latitud').val('');
        angular.element('#i_longitud').val('');
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
})

app.controller('DetalleEmpresaController', function($scope, $log) {
    $log.log('DetalleEmpresaController');

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
            
        };
});
