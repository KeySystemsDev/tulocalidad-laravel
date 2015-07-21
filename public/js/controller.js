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

app.controller('DetalleEmpresaController', function($scope, $log) {
    $log.log('DetalleEmpresaController');
    $scope.options = {scrollwheel: false};
});
