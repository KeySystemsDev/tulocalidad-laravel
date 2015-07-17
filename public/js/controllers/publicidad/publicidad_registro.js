// Declare use of strict javascript
'use strict';

app.controller('PublicidadController', function($scope, $log, estados, registro_service) {
    $log.log('PublicidadController');
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


    $scope.file            = null;
    $scope.myImage         = '';
    $scope.myCroppedImage  = '';
    $scope.srcimg          = null;
    $scope.img             = '/img/no-imagen.jpg';

    var handleFileSelect = function (evt) {
        var file        = evt.currentTarget.files[0];
        var reader      = new FileReader();
        reader.onload   = function (evt) {
            $scope.$apply(function ($scope) {
                $scope.myImage = evt.target.result;
            });
        };
        reader.readAsDataURL(file);
    };
    angular.element(document.querySelector('#fileInput')).on('change', handleFileSelect);


    $scope.snipper         = false;
    $scope.disable         = false;
    $scope.return_img = function(id){
        $scope.safeApply(function(){
            console.log("ejecutando");
            $scope.snipper = true;
            $scope.disable = true; 
           
            
            console.log("sniper "+$scope.snipper);
            console.log("disable "+$scope.disable);
            // var byteArray = Base64Binary.decodeArrayBuffer($scope.srcimg);  
            // var formData = new FormData(angular.element("#formulario"))
            // formData.append("file", byteArray, "test.png") 
            registro_service.Post({img : $scope.img}).$promise.then(
                function(data) {
                    if (data.status === "success"){
                        $scope.img = $scope.srcimg;
                        $scope.snipper = false;
                        $scope.disable = false;
                        $scope.formData.namefile = data.name;
                        console.log("sniper "+$scope.snipper);
                        console.log("disable "+$scope.disable);
                    };
                }
            );
        });
        angular.element("#myModal").modal("hide");
    };

    $scope.safeApply = function(fn) {
        var phase = this.$root.$$phase;
        if(phase == '$apply' || phase == '$digest') {
            if(fn && (typeof(fn) === 'function')) {
                fn();
            }
        } else {
            this.$apply(fn);
        }
    };
});
