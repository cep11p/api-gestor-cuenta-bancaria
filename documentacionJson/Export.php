<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gestor-inventario.local/export/cta-saldo
* @method POST
* @arrayReturn
 * [
    {
        "nacionalidad": argentino/a,
        "apellido": "Lopez",
        "nombre": "Gabriela"
        "tipo_documentoid": 1
        "nro_documento": "36849789"
        "fecha_nacimiento": "25/06/1992"
        "sexo": "Femenino"
        "lugar": {
            "calle":"Mata negra",
            "altura":"327",
            "localidad":Viedma
            "codigo_postal":8500
        }, 
        "cuil": "20369874562"
        "saldo": "5000"
        "sucursal_codigo": "250"
        "sucursal_codigo_postal": "8500"
    },
    {...},
    {
        "nacionalidad": argentino/a,
        "apellido": "Lopez",
        "nombre": "Gabriela"
        "tipo_documentoid": 1
        "nro_documento": "36849789"
        "fecha_nacimiento": "25/06/1992"
        "sexo": "Femenino"
        "lugar": {
            "calle":"Mata negra",
            "altura":"327",
            "localidad":Viedma
            "codigo_postal":8500
        }, 
        "cuil": "20369874562"
        "saldo": "5000"
        "sucursal_codigo": "250"
        "sucursal_codigo_postal": "8500"
    },
*/

/*****Para crear****
* @url http://api.gestor-inventario.local/export/guardar-cta-saldo
* @method POST
* @param arrayJson
[
    {
    	"personaid":1,
        "saldo": "5000",
        "sub_sucursalid":99,
        "sucursal_codigo": "250",
        "sucursal_codigo_postal": "8500"
    },
    {
    	"personaid":2,
        "saldo": "5000",
        "sub_sucursalid":2,
        "sucursal_codigo": "250",
        "sucursal_codigo_postal": "8500"
    },
    {
    	"personaid":3,
        "saldo": "5000",
        "sub_sucursalid":2,
        "sucursal_codigo": "250",
        "sucursal_codigo_postal": "8500"
    }
]
 * @return
[ 
    [cant_registros] => 3
    [errors] => []
]
 * @return error
[
    [cant_registros] => 2
    [errors] => [
        [0] => [
                [sub_sucursalid] => Array
                    (
                        [0] => Sub Sucursalid is invalid.
                    )

                [persona] => Victoria Margarita González cuil:20238512669
            ]
    ]

]
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
