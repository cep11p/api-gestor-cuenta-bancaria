<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/localidad-extra
* @method GET
* @arrayReturn
{
    "pagesize": 0,
    "pages": 0,
    "total_filtrado": 3,
    "resultado": [
        {
            "id": 382,
            "nombre": "Bahia Blanca",
            "regionid": null,
            "departamentoid": 9,
            "municipioid": null,
            "codigo_postal": 8000
        },
        {
            "id": 613,
            "nombre": "Carmen De Patagones",
            "regionid": null,
            "departamentoid": 78,
            "municipioid": null,
            "codigo_postal": 8504
        },
        {
            "id": 2504,
            "nombre": "Neuquen",
            "regionid": null,
            "departamentoid": 381,
            "municipioid": null,
            "codigo_postal": 8300
        }
    ]
}
*/

/*****Para crear****
* @url http://api.gcb.local/api/localidad-extra 
* @method POST
* @param arrayJson
{
	"localidadid":123,
}
**/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/api/localidad-extra/{$id} 
* @method Delete
* @return arrayJson
*/
