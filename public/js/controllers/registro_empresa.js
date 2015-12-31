'use stric'


coreApp.controller('EmpresaContoller', function($scope, $log, ajax, $window, $http, registro_service) {
    console.log("submit Controller");
    $scope.submit= function(formValid) {
        
        $scope.submitted=true;
        if (formValid==true && $scope.telefonos.length>0 && $scope.redes.length>0 ){
            console.log(true);
            var json = {};
            angular.element('#formulario').serializeArray().map(function(x){json[x.name] = x.value;});
            json['cantidad_telefonos'] = $scope.telefonos.length;
            json['cantidad_redes'] = $scope.redes.length;

            $http({
                method: 'POST',
                url: $scope.urlAction,
                data: json,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function successCallback(response) {
                console.log(response);
                //$window.location.href = $scope.urlRedirect;
              }, function errorCallback(response) {
                console.log("error");
                //$window.location.href = $scope.urlRedirect;
                // called asynchronously if an error occurs
                // or server returns response with an error status.
              });           
        };
        console.log(false);
        return false;

    }

    console.log('EmpresaContoller');
    $scope.telefonos  = [];
    $scope.redes  = [];
    $scope.empresa  = {};
    $scope.submitted = false;
    $scope.opciones_servicio = [];
    $scope.data_select_multiple =[];


    $scope.file            = null;
    $scope.myImage         = '';
    $scope.myCroppedImage  = '';
    $scope.srcimg          = null;
    $scope.img             = '/img/no-imagen.jpg';

    $scope.map = {center: {latitude: 10.4713637669733, longitude: -66.807892578125 }, zoom: 9 };
    $scope.options = {scrollwheel: false};

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


    $scope.addPhone = function() {
        if ($scope.telefonos.length < 10){
            var obj = {
                    numero: '',
                    codigo: '',
            }
            $scope.telefonos.push(obj);
        }
    }

    $scope.delPhone = function(index) {
        console.log(index);
        $scope.telefonos.splice(index,1);
    }
    $scope.incializar_telefonos = function(array) {
        console.log(array);
        for (i in array){
            var obj = {
                numero: array[i].numero_telefono,
                codigo: array[i].codigo_telefono,
            };
            $scope.telefonos.push(obj);
        }
    }

    $scope.addRed = function() {
        if ($scope.redes.length < 10){
            var obj = {
                    id_red_social: '',
                    identificador_red: '',
            }
            $scope.redes.push(obj);
        }
    }

    $scope.delRed = function(index) {
        console.log(index);
        $scope.redes.splice(index,1);
    }    

    $scope.incializar_redes = function(array) {
        console.log(array);
        for (i in array){
            var obj = {
                id_red_social: array[i].id_red_social,
                identificador_red: array[i].identificador_red,
            };
            $scope.redes.push(obj);
        }
    }


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
        var url = "/upload/img";
        var datos = {img : $scope.img};
        registro_service.Post( datos).$promise.then(
            function(data) {
                if (data.status === "success"){
                    $scope.snipper = false;
                    $scope.disable = false;
                    $scope.empresa.url_imagen_empresa = data.name;
                }else{
                    $scope.titulo = "Error (5001)";
                    $scope.mensaje = "Disculpe, intente seleccionar su imagen nuevamente. Si el error continua contacte a soporte técnico.";
                    $scope.redirecto = function() {
                        $window.location.href = "#";
                    }                    
                    angular.element("#validacion_modal").modal("show");
                }
            },
            //error (400,500)
            function(data) {
                $scope.titulo = "Error (7778)";
                $scope.mensaje = "Disculpe, Intentelo nuevamente. Si el error continua contacte a soporte técnico.";
                $scope.redirecto = function(){
                    $window.location.reload();
                };
                angular.element("#validacion_modal").modal("show");
            });
        angular.element("#myModal").modal("hide");
    };    

});