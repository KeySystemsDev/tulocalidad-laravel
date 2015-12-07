'use stric'


coreApp.controller('EmpresaContoller', function($scope, $log, ajax, $window, registro_service) {
    console.log('EmpresaContoller');
    $scope.telefonos  = [];
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