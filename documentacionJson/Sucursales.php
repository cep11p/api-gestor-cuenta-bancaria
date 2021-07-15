<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/sucursales
* @method GET
* @arrayReturn
 * [
    {
        "id": 1,
        "nombre": "Cinco Saltos",
        "codigo": "256"
    },
    {
        "id": 2,
        "nombre": "General Roca",
        "codigo": "220"
    },
    {
        "id": 3,
        "nombre": "Bariloche",
        "codigo": "255"
    },
    {
        "id": 4,
        "nombre": "Villa Regina",
        "codigo": "253"
    }
 * ]
*/

/*****Para crear****
* @url http://api.gcb.local/api/sucursales
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gcb.local/api/sucursales/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gcb.local/api/sucursales/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/api/sucursales/{$id} 
* @method Delete
* @return arrayJson
*/
