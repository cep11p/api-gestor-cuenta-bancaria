<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/backend-localidads
* @method GET
* @arrayReturn
{
    "pagesize": 0,
    "pages": 0,
    "total_filtrado": 4027,
    "resultado": [
        {
            "id": 381,
            "nombre": "16 De Julio",
            "regionid": null,
            "departamentoid": 8,
            "municipioid": null,
            "codigo_postal": null,
            "extra": false
        },
        {...},
        {
            "id": 640,
            "nombre": "17 De Agosto",
            "regionid": null,
            "departamentoid": 85,
            "municipioid": null,
            "codigo_postal": null,
            "extra": false
        }
    ]
}
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
