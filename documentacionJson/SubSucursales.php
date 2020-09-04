<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/sub-sucursales
* @method GET
* @arrayReturn
 * [
    {
        "id": 1,
        "localidad": "Allen",
        "codigo_postal": "8328",
        "codigo": "161014",
        "sucursalid": 14,
        "nombre": "Allen (Suc. Allen)",
        "sucursal_codigo": "265"
    },
    {
        "id": 2,
        "localidad": "Bariloche",
        "codigo_postal": "8400",
        "codigo": "161399",
        "sucursalid": 3,
        "nombre": "Bariloche (Suc. Bariloche)",
        "sucursal_codigo": "255"
    },
    {
        "id": 3,
        "localidad": "Pilcaniyeu",
        "codigo_postal": "8412",
        "codigo": "161355",
        "sucursalid": 3,
        "nombre": "Pilcaniyeu (Suc. Bariloche)",
        "sucursal_codigo": "255"
    },
    {
        "id": 4,
        "localidad": "C. Belisle",
        "codigo_postal": "8364",
        "codigo": "161127",
        "sucursalid": 1,
        "nombre": "C. Belisle (Suc. Cinco Saltos)",
        "sucursal_codigo": "256"
    }
 * ]
*/

/*****Para crear****
* @url http://api.gcb.local/sub-sucursales
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gcb.local/sub-sucursales/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gcb.local/sub-sucursales/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/sub-sucursales/{$id} 
* @method Delete
* @return arrayJson
*/
