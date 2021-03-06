// Declare use of strict javascript
'use strict';

app.factory("estados", function ($resource) {
    return $resource("/movil/empresa/estados", //la url donde queremos consumir
        {}, //aquí podemos pasar variables que queramos pasar a la consulta
        //a la función get le decimos el método, y, si es un array lo que devuelve
        //ponemos isArray en true
        { get: { method: "GET", isArray: true }
    })
});
app.factory("registro_service", function($resource){
    return $resource('/upload/img', {}, {
        Post:{
            method: "POST",
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        }

    })
});

app.factory("ajax", function($resource){

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