<?php

/**** Importacion de personas con cbu mediante el archivo CTABPS.TXT ****/
/**
* @url http://api.gcb.local/cuenta-bps/importar
* @method POST
* @arrayReturn
{
    "cuenta": {
        "creadas": 59,
        "errors": []
    },
    "prestacion": {
        "registradas": 59,
        "errors": []
    },
    "importacion_error": [
        "No se encuentra registrada la persona ROSA DEL CARMEN CHANDIA cuil:27120571929",
        "No se encuentra registrada la persona CARLOS FRANCISC SINIGUAL cuil:20200486812",
        "No se encuentra registrada la persona MIGUEL ANGEL ACU\\D1A cuil:08231681635",
        "No se encuentra registrada la persona MERCEDES ANABE PE\\D1A cuil:08273058425"
    ]
}
*/

/*****Para crear****
* @url http://api.gestor-inventario.local/proveedors 
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gestor-inventario.local/proveedors/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gestor-inventario.local/proveedors/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gestor-inventario.local/proveedors/{$id} 
* @method Delete
* @return arrayJson
*/
