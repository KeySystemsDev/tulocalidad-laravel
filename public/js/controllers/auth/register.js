// Declare use of strict javascript
'use strict';


app.controller('RegisterUsuarioController', function($scope, $log) {
	$log.log('RegisterUsuarioController');

    $scope.pw = '';

	$scope.checkMe = function(){
	  	if (document.formulario.pw.value == document.formulario.pw2.value){
	    	document.formulario._token.value=document.formulario.pw.value;
	    	document.formulario.submit();
	  	}else
	    	$scope.error = 1;
	}
});