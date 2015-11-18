// Declare use of strict javascript
'use strict';

// Declare use of strict javascript
'use strict';

coreApp.factory("HotelImgService", function($resource){
    return $resource('/upload-image-hotel', {}, {
        Post:{
            method: "POST",
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        }

    })
});

coreApp.factory("PaqueteImgService", function($resource){
    return $resource('/upload-image-paquete', {}, {
        Post:{
            method: "POST",
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        }

    })
});

coreApp.factory("registro_service", function($resource){
    return $resource('/upload/img', {}, {
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
                }

            }).Post();
        }
    }
});