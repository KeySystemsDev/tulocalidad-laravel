// Declare use of strict javascript
'use strict';

// Application -----------------------------------------------------------------

angular.module('tulocalidad', ['tulocalidad.controller','tulocalidad.services','uiGmapgoogle-maps'] 
							
		, function($interpolateProvider){

			$interpolateProvider.startSymbol('[[');
			$interpolateProvider.endSymbol(']]');
							
});


