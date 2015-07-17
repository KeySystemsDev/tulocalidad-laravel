// Declare use of strict javascript
'use strict';

app.controller('EmpresaRegistroController', function($scope, $log, estados, registro_service, $timeout) {
    $log.log('EmpresaRegistroController');
    var Base64Binary = {
        _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
        
        /* will return a  Uint8Array type */
        decodeArrayBuffer: function(input) {
            var bytes = (input.length/4) * 3;
            var ab = new ArrayBuffer(bytes);
            this.decode(input, ab);
            
            return ab;
        },

        removePaddingChars: function(input){
            var lkey = this._keyStr.indexOf(input.charAt(input.length - 1));
            if(lkey == 64){
                return input.substring(0,input.length - 1);
            }
            return input;
        },

        decode: function (input, arrayBuffer) {
            //get last chars to see if are valid
            input = this.removePaddingChars(input);
            input = this.removePaddingChars(input);

            var bytes = parseInt((input.length / 4) * 3, 10);
            
            var uarray;
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;
            var j = 0;
            
            if (arrayBuffer)
                uarray = new Uint8Array(arrayBuffer);
            else
                uarray = new Uint8Array(bytes);
            
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            
            for (i=0; i<bytes; i+=3) {  
                //get the 3 octects in 4 ascii chars
                enc1 = this._keyStr.indexOf(input.charAt(j++));
                enc2 = this._keyStr.indexOf(input.charAt(j++));
                enc3 = this._keyStr.indexOf(input.charAt(j++));
                enc4 = this._keyStr.indexOf(input.charAt(j++));
        
                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;
        
                uarray[i] = chr1;           
                if (enc3 != 64) uarray[i+1] = chr2;
                if (enc4 != 64) uarray[i+2] = chr3;
            }
        
            return uarray;  
        }
    };

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
    console.log($scope.estados);

    $scope.estado_ruta = function(estado) {
        $scope.array = estado.split('+');

        if ($scope.array.length == 1){
            $scope.array[0] = "0";
            $scope.array[1] = "10.333083818097196";
            $scope.array[2] = "-67.03379895019532";
        };
        console.log($scope.array);

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
