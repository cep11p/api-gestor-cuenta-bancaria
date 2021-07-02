<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/backend-localidads
* @method GET
* @arrayReturn
[
    {
        "id": 2636,
        "nombre": "Aguada Cecilio",
        "regionid": null,
        "departamentoid": 404,
        "municipioid": null,
        "codigo_postal": 8534
    },
    {
        "id": 3976,
        "nombre": "Aguada de Guerra",
        "regionid": null,
        "departamentoid": 399,
        "municipioid": null,
        "codigo_postal": 8424
    },
    {
        "id": 2616,
        "nombre": "Aguada Guzman",
        "regionid": null,
        "departamentoid": 400,
        "municipioid": null,
        "codigo_postal": 8333
    }
]
*/

/*****Para crear****
* @url http://api.gcb.local/backend-localidads 
* @method POST
* @param arrayJson
{
	"nombre":"Milocali",
	"departamentoid":1,
	"codigo_postal":"8200"
}
**/

/**** Para modificar*****
* @url http://api.gcb.local/backend-localidads/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gcb.local/backend-localidads/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/backend-localidads/{$id} 
* @method Delete
* @return arrayJson
*/
