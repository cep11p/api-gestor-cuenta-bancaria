<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/bancos
* @method GET
* @arrayReturn
[
    {
        "id": 1,
        "nombre": "BANCO PATAGONIA S.A."
    },
    {
        "id": 2,
        "nombre": "BANCO DE GALICIA Y BUENOS AIRES S.A.U."
    },
    {
        "id": 3,
        "nombre": "BANCO DE LA NACION ARGENTINA"
    },
    {
        "id": 4,
        "nombre": "BANCO DE LA PROVINCIA DE BUENOS AIRES"
    },
    {
        "id": 5,
        "nombre": "INDUSTRIAL AND COMMERCIAL BANK OF CHINA"
    },
    {
        "id": 6,
        "nombre": "CITIBANK N.A."
    }
]
*/

/*****Para crear****
* @url http://api.gcb.local/bancos 
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gcb.local/bancos/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gcb.local/bancos/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/bancos/{$id} 
* @method Delete
* @return arrayJson
*/
