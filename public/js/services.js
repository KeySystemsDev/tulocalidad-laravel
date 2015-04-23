// Declare use of strict javascript
'use strict';

angular.module('tulocalidad.services', [])

.factory("estados", function ($resource) {
    return $resource("http://localhost:8000/movil/empresa/estados", //la url donde queremos consumir
        {}, //aquí podemos pasar variables que queramos pasar a la consulta
        //a la función get le decimos el método, y, si es un array lo que devuelve
        //ponemos isArray en true
        { get: { method: "GET", isArray: true }
    })
});