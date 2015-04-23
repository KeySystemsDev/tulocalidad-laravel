// Declare use of strict javascript
'use strict';

// Application -----------------------------------------------------------------

angular.module('tulocalidad', 

	['tulocalidad.controller','tulocalidad.services','ngResource','uiGmapgoogle-maps'] 
							
		, function($interpolateProvider){

			$interpolateProvider.startSymbol('[[');
			$interpolateProvider.endSymbol(']]');
							
});


