<?php

/**** Exportar txt CTASALDO ****/
/**
* Se exporta CTASLDO.txt y se registran las prestaciones con estado = 0 (Prestaciones de personas sin CBU) 
* @url http://api.gcb.local/cuenta-saldo/exportar
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
* Se guarda las prestacion con estado=4 "preparado para exportar"
* @url http://api.gestor-inventario.local/cuenta-saldos
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

/****** Para visualizar las prestaciones que aun no fueron exportadas*****
* @url http://api.gcb.local/cuenta-saldos
* @method GET
* @return arrayJson
[
    {
        "id": "102",
        "monto": "5000",
        "create_at": "2020-10-14 18:10:08",
        "proposito": null,
        "observacion": "Se crea en exportacion de CtaSaldo",
        "sub_sucursalid": "1",
        "personaid": "1",
        "estado": "4",
        "fecha_ingreso": "2020-10-14",
        "apellido": "González",
        "nombre": "Victoria Margarita",
        "cuil": "20238512669",
        "sub_sucursal": {
            "id": 1,
            "localidad": "Allen",
            "codigo_postal": "8328",
            "codigo": "161014",
            "sucursalid": 14,
            "nombre": "Allen (Suc. Allen)",
            "sucursal_codigo": "265"
        }
    },
    {
        "id": "103",
        "monto": "5000",
        "create_at": "2020-10-14 18:10:08",
        "proposito": null,
        "observacion": "Se crea en exportacion de CtaSaldo",
        "sub_sucursalid": "2",
        "personaid": "2",
        "estado": "4",
        "fecha_ingreso": "2020-10-14",
        "apellido": "Rodríguez",
        "nombre": "Isabel Sofía",
        "cuil": "20320542389",
        "sub_sucursal": {
            "id": 2,
            "localidad": "Bariloche",
            "codigo_postal": "8400",
            "codigo": "161399",
            "sucursalid": 3,
            "nombre": "Bariloche (Suc. Bariloche)",
            "sucursal_codigo": "255"
        }
    },
    {
        "id": "104",
        "monto": "5000",
        "create_at": "2020-10-14 18:10:08",
        "proposito": null,
        "observacion": "Se crea en exportacion de CtaSaldo",
        "sub_sucursalid": "2",
        "personaid": "3",
        "estado": "4",
        "fecha_ingreso": "2020-10-14",
        "apellido": "Gómez",
        "nombre": "Dulce María",
        "cuil": "20284145559",
        "sub_sucursal": {
            "id": 2,
            "localidad": "Bariloche",
            "codigo_postal": "8400",
            "codigo": "161399",
            "sucursalid": 3,
            "nombre": "Bariloche (Suc. Bariloche)",
            "sucursal_codigo": "255"
        }
    },
    {
        "id": "105",
        "monto": "5000",
        "create_at": "2020-10-14 18:10:08",
        "proposito": null,
        "observacion": "Se crea en exportacion de CtaSaldo",
        "sub_sucursalid": "1",
        "personaid": "1",
        "estado": "4",
        "fecha_ingreso": "2020-10-14",
        "apellido": "González",
        "nombre": "Victoria Margarita",
        "cuil": "20238512669",
        "sub_sucursal": {
            "id": 1,
            "localidad": "Allen",
            "codigo_postal": "8328",
            "codigo": "161014",
            "sucursalid": 14,
            "nombre": "Allen (Suc. Allen)",
            "sucursal_codigo": "265"
        }
    },
    {
        "id": "106",
        "monto": "5000",
        "create_at": "2020-10-14 18:10:08",
        "proposito": null,
        "observacion": "Se crea en exportacion de CtaSaldo",
        "sub_sucursalid": "2",
        "personaid": "2",
        "estado": "4",
        "fecha_ingreso": "2020-10-14",
        "apellido": "Rodríguez",
        "nombre": "Isabel Sofía",
        "cuil": "20320542389",
        "sub_sucursal": {
            "id": 2,
            "localidad": "Bariloche",
            "codigo_postal": "8400",
            "codigo": "161399",
            "sucursalid": 3,
            "nombre": "Bariloche (Suc. Bariloche)",
            "sucursal_codigo": "255"
        }
    },
    {
        "id": "107",
        "monto": "5000",
        "create_at": "2020-10-14 18:10:08",
        "proposito": null,
        "observacion": "Se crea en exportacion de CtaSaldo",
        "sub_sucursalid": "2",
        "personaid": "3",
        "estado": "4",
        "fecha_ingreso": "2020-10-14",
        "apellido": "Gómez",
        "nombre": "Dulce María",
        "cuil": "20284145559",
        "sub_sucursal": {
            "id": 2,
            "localidad": "Bariloche",
            "codigo_postal": "8400",
            "codigo": "161399",
            "sucursalid": 3,
            "nombre": "Bariloche (Suc. Bariloche)",
            "sucursal_codigo": "255"
        }
    }
]

*/

/**** Para modificar*****
* @url http://api.gestor-inventario.local/proveedors/{$id} 
* @method PUT
* @param arrayJson
**/


/****** Para borrar una localidad *****
* @url http://api.gestor-inventario.local/proveedors/{$id} 
* @method Delete
* @return arrayJson
*/
