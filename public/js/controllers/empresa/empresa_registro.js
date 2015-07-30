// Declare use of strict javascript
'use strict';

app.controller('EmpresaRegistroController', function($scope, $log, estados, registro_service, ajax, $timeout, $window) {
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

    $scope.snipper                  = false;
    $scope.disable                  = false;
    $scope.return_img = function(id){
        $scope.snipper = true;
        $scope.disable = true;
        $scope.img = $scope.srcimg;
        registro_service.Post({img : $scope.img}).$promise.then(
            function(data) {
                if (data.status === "success"){
                    $scope.snipper = false;
                    $scope.disable = false;
                    $scope.formData.namefile = data.name;
                }else{
                    $scope.titulo = "Error (5001)";
                    $scope.mensaje = "Disculpe, intente seleccionar su imagen nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                    $scope.redirecto = function() {
                        $window.location.href = "/mis-empresas/agregar";
                    }                    
                    angular.element("#validacion_modal").modal("show");
                }
            },
            //error (400,500)
            function(data) {
                $scope.titulo = "Error (7778)";
                $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                $scope.redirecto = function() {
                    $window.location.href = "/mis-empresas/agregar";
                };
                angular.element("#validacion_modal").modal("show");
            });
        angular.element("#myModal").modal("hide");
    };
    $scope.titulo   = "";
    $scope.mensaje  = "";

    $scope.rif ="";
    $scope.invalidrif = true;
    $scope.rifsubmit  = false;
    $scope.ValidateRif =function(){
        var validador = /^([JGVEPjgvep][-][0-9]{8}[-][0-9]{1})$/;
        $scope.rifsubmit  = true;
        if (validador.test($scope.rif)){
            ajax.Post("/verificacion/rif", {"rif":$scope.rif } ).$promise.then(
                //200
                function(data) {
                    if (data.success == false){
                        $scope.invalidrif = true;
                        $scope.titulo = "Disculpe!";
                        $scope.mensaje = "El Rif que coloco actualmente esta siendo usado por otra empresa. Si puede comprobar que este Rif le pertenece, envíe una copia a soporte@tulocalidad.com.ve para tomar las medidas necesarias.";
                        $scope.redirecto = function() {} 
                        angular.element("#validacion_modal").modal("show");
                        $scope.rif = "";
                    }else{
                        $scope.invalidrif = false;
                    }
                },
                //error (400,500)
                function(data) {
                    $scope.invalidrif = true;
                    $scope.titulo = "Error (7777)";
                    $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                    $scope.redirecto = function() {
                        $window.location.href = "/mis-empresas/agregar";
                    };
                    angular.element("#validacion_modal").modal("show");
                });
        }else{
            $scope.invalidrif = true;
        };
    };


    $scope.checkMe = function(){
        var data = {};
        // TRANSFORMANDO UN FORM A UN JSON
        angular.element('#formulario').serializeArray().map(function(x){data[x.name] = x.value;});
        ajax.Post("/mis-empresas/agregar-exitoso", data ).$promise.then(
            function(data) {
                $scope.titulo = "Registro de empresa"
                if (data.success){
                    $scope.mensaje      = data.mensaje;
                    $scope.redirecto    = function() {
                        $window.location.href = "/mis-empresas/"; 
                    }                
                }else{
                    $scope.titulo       = data.data.titulo;
                    $scope.mensaje      = data.mensaje;
                    $scope.redirecto    = function() {
                        //$route.reload();
                        $window.location.href = "/mis-empresas/agregar"; 
                    }
                }
                angular.element("#validacion_modal").modal("show");
            },
            //error (400,500)
            function(data) {
                    $scope.titulo = "Error (7779)";
                    $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte (soporte@tulocalidad.com.ve)";
                    $scope.redirecto = function() {
                        $window.location.href = "/mis-empresas/agregar"; 
                    } 
                    angular.element("#validacion_modal").modal("show");
            });
        }

});
