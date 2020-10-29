<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/cuentas
* @url http://api.gcb.local/cuentas?ids=1,2,3 url con filtrado de ids
* @method GET
* @arrayReturn
[
    {
        "id": 1,
        "cbu": "340220908126708871006",
        "personaid": 1,
        "bancoid": 1,
        "tipo_cuentaid": 1,
        "create_at": "2020-10-16 16:10:43",
        "banco": "Patagonia",
        "tipo_cuenta": "cuenta corriente",
        "cuil": "20238512669",
        "apellido": "González",
        "nombre": "Victoria Margarita"
    },
    {
        "id": 2,
        "cbu": "340250608122051844009",
        "personaid": 2,
        "bancoid": 1,
        "tipo_cuentaid": 1,
        "create_at": "2020-10-16 16:10:43",
        "banco": "Patagonia",
        "tipo_cuenta": "cuenta corriente",
        "cuil": "20320542389",
        "apellido": "Rodríguez",
        "nombre": "Isabel Sofía"
    },
    {
        "id": 3,
        "cbu": "340250608122051855003",
        "personaid": 3,
        "bancoid": 1,
        "tipo_cuentaid": 1,
        "create_at": "2020-10-16 16:10:43",
        "banco": "Patagonia",
        "tipo_cuenta": "cuenta corriente",
        "cuil": "20284145559",
        "apellido": "Gómez",
        "nombre": "Dulce María"
    }
]
*/

/*****Para crear****
* @url http://api.gcb.local/cuentas 
* @method POST
* @param arrayJson
**/

/**** Para modificar*****
* @url http://api.gcb.local/cuentas/{$id} 
* @method PUT
* @param arrayJson
**/

/****** Para visualizar*****
* @url http://api.gcb.local/cuentas/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una localidad *****
* @url http://api.gcb.local/cuentas/{$id} 
* @method Delete
* @return arrayJson
*/
