'use stric'


coreApp.controller('ServicioContoller', function($scope, $log, ajax, $window, registro_service) {
    console.log('ServicioContoller');

    $scope.model  = {};
    $scope.submitted = false;
    $scope.opciones_servicio = [];
    $scope.data_select_multiple =[];


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
        var url = "/upload/img";
        var datos = {img : $scope.img};
        registro_service.Post( datos).$promise.then(
            function(data) {
                if (data.status === "success"){
                    $scope.snipper = false;
                    $scope.disable = false;
                    $scope.model.url_imagen_servicio = data.name;
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