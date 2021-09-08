<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gestor-inventario.local/api/areas
* @method GET
* @arrayReturn
    [
        {
            "id": 1,
            "nombre": "Secretaria de Políticas Sociales y Articulación Territorial"
        },
        {
            "id": 2,
            "nombre": "SubSecretaria de Integración Social"
        }
    ]
*/

/*****Para crear****
* @url http://api.gestor-inventario.local/api/areas 
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gestor-inventario.local/api/areas/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gestor-inventario.local/api/areas/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gestor-inventario.local/api/areas/{$id} 
* @method Delete
* @return arrayJson
*/
