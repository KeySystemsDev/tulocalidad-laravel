'use stric'

coreApp.controller('SolicitudesController', function($scope, $log, ajax, $window, $http, $rootScope) {
    console.log("SolicitudesController");    
    
    $scope.pagoInfo = function(item){
        $rootScope.urlAction = $scope.url;
        $rootScope.urlRedirect = $scope.url;
    }
})

;