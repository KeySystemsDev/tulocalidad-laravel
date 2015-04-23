// Declare use of strict javascript
'use strict';

// Application -----------------------------------------------------------------

angular.module('tulocalidad', ['tulocalidad.controller','uiGmapgoogle-maps'] 
							
		, function($interpolateProvider){

			$interpolateProvider.startSymbol('[[');
			$interpolateProvider.endSymbol(']]');
							
});


