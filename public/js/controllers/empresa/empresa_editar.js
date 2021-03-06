// Declare use of strict javascript
'use strict';

app.controller('EditarEmpresaController', function($scope, $log, estados, registro_service) {
    $log.log('EditarEmpresaController');

    $scope.estados = estados.get();

    $scope.options = {scrollwheel: false};
    $scope.coordsUpdates = 0;
    $scope.dynamicMoveCtr = 0;

    $scope.init = function(i_latitud , i_longitud){
        
        $scope.map = {center: {latitude: i_latitud, longitude: i_longitud }, zoom: 9 };
        $scope.marker = {
            id: 0,
                coords: {
                    latitude: i_latitud,
                    longitude: i_longitud
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
    $scope.estado_ruta = function(estado) {
        $scope.array = estado.split('+');
        if ($scope.array.length == 1){
            $scope.array[0] = "0";
            $scope.array[1] = "10.333083818097196";
            $scope.array[2] = "-67.03379895019532";
        };
        $scope.map = {center : { latitude: $scope.array[1], longitude: $scope.array[2] }};
        angular.element('#id_estado').val($scope.array[0]);
        angular.element('#i_latitud').val($scope.array[1]);
        angular.element('#i_longitud').val($scope.array[2]);
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

    $scope.formData        = {};
    $scope.file            = null;
    $scope.myImage         = '';
    $scope.myCroppedImage  = '';
    $scope.srcimg          = null;
    $scope.img             = '';

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
        $scope.snipper = true;
        $scope.disable = true;
        $scope.img = $scope.srcimg;
        // var byteArray = Base64Binary.decodeArrayBuffer($scope.srcimg);  
        // var formData = new FormData(angular.element("#formulario"))
        // formData.append("file", byteArray, "test.png") 
        registro_service.Post({img : $scope.img}).$promise.then(
            function(data) {
                if (data.status === "success"){
                    $scope.snipper = false;
                    $scope.disable = false;
                    $scope.formData.namefile = data.name;
                };
            }
        );
        angular.element("#myModal").modal("hide");
    };
});