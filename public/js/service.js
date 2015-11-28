// Declare use of strict javascript
'use strict';

// Declare use of strict javascript
'use strict';

coreApp.factory("registro_service", function($resource){
    return $resource('http://www.keypanelservices.com/tulocalidad_pruebas/upload/img', {}, {
        Post:{
            method: "POST",
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        }

    })
});

coreApp.factory("ajax", function($resource){
    return {
        Post: function(url, params){
            return $resource(url, params, {
            Post:{
                method: "POST",
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                },
            Get:{
                method: "GET",
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            }

            }).Post();
        },
        Get: function(url, params){
            return $resource(url, params, {
            Get:{
                method: "GET",
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            }

            }).Get();
        }        
    }
});