<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/departamentos
* @params ?provinciaid=16 departamentos de la provincia de rio negro
* @method GET
* @arrayReturn
[
    {
        "id": 392,
        "nombre": "Rio Negro",
        "provinciaid": 16
    },
    {
        "id": 393,
        "nombre": "Bariloche",
        "provinciaid": 16
    },
    {
        "id": 405,
        "nombre": "Adolfo Alsina",
        "provinciaid": 16
    },
    {...}
]
*/

/*****Para crear****
* @url http://api.gcb.local/api/departamentos 
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gcb.local/api/departamentos/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gcb.local/api/departamentos/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/api/departamentos/{$id} 
* @method Delete
* @return arrayJson
*/
