<?php

/**** Exportar txt CTASALDO ****/
/**
* Se exporta CTASLDO.txt y se registran las prestaciones con estado = 0 (Prestaciones de personas sin CBU) 
* @url http://api.gcb.local/cuenta-saldo/exportar
* @method POST
* @arrayReturn
 * [
    {
        "id":1,
        "prestacion":{
            "fecha_ingreso":"2020-03-03",
            "monto": "5000",
            "sub_sucursalid":1,
            "observacion":"",
            "proposito":""
        }
    },
    {
        "id":2,
        "prestacion":{
            "fecha_ingreso":"2020-03-03",
            "monto": "5000",
            "sub_sucursalid":1,
            "observacion":"",
            "proposito":""
        }
    },
    {
        "id":3,
        "prestacion":{
            "fecha_ingreso":"2020-03-03",
            "monto": "5000",
            "sub_sucursalid":1,
            "observacion":"",
            "proposito":""
        }
    }
 * ]
*/

/*****Para crear****
* Se guarda las prestacion con estado=4 "preparado para exportar"
* @url http://api.gestor-inventario.local/cuenta-saldos
* @method POST
* @param arrayJson
[
    {
        "id":1,
        "prestacion":{
            "fecha_ingreso":"2020-03-03",
            "monto": "5000",
            "sub_sucursalid":1,
            "observacion":"",
            "proposito":""
        }
    },
    {
        "id":2,
        "prestacion":{
            "fecha_ingreso":"2020-03-03",
            "monto": "5000",
            "sub_sucursalid":1,
            "observacion":"",
            "proposito":""
        }
    },
    {
        "id":3,
        "prestacion":{
            "fecha_ingreso":"2020-03-03",
            "monto": "5000",
            "sub_sucursalid":1,
            "observacion":"",
            "proposito":""
        }
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
        "prestacion": {
            "id": "102",
            "monto": "5000",
            "create_at": "2020-10-14 18:10:08",
            "proposito": null,
            "observacion": "Se crea en exportacion de CtaSaldo",
            "sub_sucursalid": "1",
            "personaid": "1",
            "estado": "4",
            "fecha_ingreso": "2020-10-14"
        },
        "id": 1,
        "apellido": "González",
        "nombre": "Victoria Margarita",
        "cuil": "20238512669",
        "lugar": {
            "id": 1,
            "nombre": "",
            "calle": "escalera 39 planta baja dpto. d b°guido",
            "altura": "",
            "localidadid": 2640,
            "latitud": "",
            "longitud": "",
            "barrio": "",
            "piso": "",
            "depto": "",
            "escalera": "",
            "entre_calle_1": "",
            "entre_calle_2": "",
            "localidad": "Viedma",
            "codigo_postal": 8500
        }
    },
    {
        "prestacion": {
            "id": "103",
            "monto": "5000",
            "create_at": "2020-10-14 18:10:08",
            "proposito": null,
            "observacion": "Se crea en exportacion de CtaSaldo",
            "sub_sucursalid": "2",
            "personaid": "2",
            "estado": "4",
            "fecha_ingreso": "2020-10-14"
        },
        "id": 2,
        "apellido": "Rodríguez",
        "nombre": "Isabel Sofía",
        "cuil": "20320542389",
        "lugar": {
            "id": 2,
            "nombre": "",
            "calle": "escalea 6 3°piso a barrio guido",
            "altura": "",
            "localidadid": 2640,
            "latitud": "",
            "longitud": "",
            "barrio": "",
            "piso": "",
            "depto": "",
            "escalera": "",
            "entre_calle_1": "",
            "entre_calle_2": "",
            "localidad": "Viedma",
            "codigo_postal": 8500
        }
    },
    {
        "prestacion": {
            "id": "104",
            "monto": "5000",
            "create_at": "2020-10-14 18:10:08",
            "proposito": null,
            "observacion": "Se crea en exportacion de CtaSaldo",
            "sub_sucursalid": "2",
            "personaid": "3",
            "estado": "4",
            "fecha_ingreso": "2020-10-14"
        },
        "id": 3,
        "apellido": "Gómez",
        "nombre": "Dulce María",
        "cuil": "20284145559",
        "lugar": {
            "id": 3,
            "nombre": "",
            "calle": "guido 865",
            "altura": "",
            "localidadid": 2640,
            "latitud": "",
            "longitud": "",
            "barrio": "",
            "piso": "",
            "depto": "",
            "escalera": "",
            "entre_calle_1": "",
            "entre_calle_2": "",
            "localidad": "Viedma",
            "codigo_postal": 8500
        }
    },
    {
        "prestacion": {
            "id": "105",
            "monto": "5000",
            "create_at": "2020-10-14 18:10:08",
            "proposito": null,
            "observacion": "Se crea en exportacion de CtaSaldo",
            "sub_sucursalid": "1",
            "personaid": "1",
            "estado": "4",
            "fecha_ingreso": "2020-10-14"
        },
        "id": 1,
        "apellido": "González",
        "nombre": "Victoria Margarita",
        "cuil": "20238512669",
        "lugar": {
            "id": 1,
            "nombre": "",
            "calle": "escalera 39 planta baja dpto. d b°guido",
            "altura": "",
            "localidadid": 2640,
            "latitud": "",
            "longitud": "",
            "barrio": "",
            "piso": "",
            "depto": "",
            "escalera": "",
            "entre_calle_1": "",
            "entre_calle_2": "",
            "localidad": "Viedma",
            "codigo_postal": 8500
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
