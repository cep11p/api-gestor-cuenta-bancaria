<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/cuentas
* @url http://api.gcb.local/cuentas?ids=1,2,3 url con filtrado de ids
* @url http://api.gcb.local/cuentas?global_param=27351545475 url con filtro cuil, nombre, apellido o nro de documento
* @url http://api.gcb.local/cuentas?fecha_desde=2021-01-11&fecha_hasta=2021-04-10
* @method GET
* @arrayReturn
{
    "pagesize": 20,
    "pages": 3,
    "total_filtrado": 59,
    "resultado": [
        {
            "id": 1,
            "cbu": "0340220908126708871006",
            "personaid": 102,
            "bancoid": 1,
            "tipo_cuentaid": 1,
            "create_at": "2020-10-29 14:10:34",
            "tesoreria_alta": 1,
            "banco": "Patagonia",
            "tipo_cuenta": "Cuenta Corriente",
            "apellido": "Marileo",
            "nombre": "Romina Azucena",
            "cuil": "27351545475",
            "nro_documento": "35154547",
            "fecha_nacimiento": "1970-05-21",
            "estado_civil": "Soltero/a",
            "sexo": "Femenino",
            "telefono": "",
            "celular": "",
            "lugar": {
                "id": 464,
                "nombre": "",
                "calle": "hipolito yrigoyen",
                "altura": "771",
                "localidadid": 2576,
                "latitud": "",
                "longitud": "",
                "barrio": "",
                "piso": "",
                "depto": "",
                "escalera": "",
                "entre_calle_1": "",
                "entre_calle_2": "",
                "localidad": "General Roca",
                "codigo_postal": 8332
            }
        },
        {
            "id": 2,
            "cbu": "0340250608122051844009",
            "personaid": 103,
            "bancoid": 1,
            "tipo_cuentaid": 1,
            "create_at": "2020-10-29 14:10:34",
            "tesoreria_alta": 1,
            "banco": "Patagonia",
            "tipo_cuenta": "Cuenta Corriente",
            "apellido": "Benitez",
            "nombre": "Celinda",
            "cuil": "27113457886",
            "nro_documento": "11345788",
            "fecha_nacimiento": "1970-10-29",
            "estado_civil": "Soltero/a",
            "sexo": "Femenino",
            "telefono": "",
            "celular": "",
            "lugar": {
                "id": 465,
                "nombre": "",
                "calle": "belgrano",
                "altura": "1781",
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
            "id": 3,
            "cbu": "0340250608122051855003",
            "personaid": 104,
            "bancoid": 1,
            "tipo_cuentaid": 1,
            "create_at": "2020-10-29 14:10:34",
            "tesoreria_alta": 1,
            "banco": "Patagonia",
            "tipo_cuenta": "Cuenta Corriente",
            "apellido": "Sacco",
            "nombre": "Ruben Dalmiro",
            "cuil": "20123827679",
            "nro_documento": "12382767",
            "fecha_nacimiento": "1970-12-03",
            "estado_civil": "Soltero/a",
            "sexo": "Masculino",
            "telefono": "",
            "celular": "",
            "lugar": {
                "id": 466,
                "nombre": "",
                "calle": "mendoza",
                "altura": "360",
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
]
*/

/*****Para crear****
* @url http://api.gcb.local/cuentas 
* @method POST
* @param arrayJson
    {
    "personaid":11,
    "bancoid": 1,
    "cbu":"0344567891234567891234"
    }
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

/****** Para borrar una cuenta *****
* @url http://api.gcb.local/cuentas/{$id} 
* @method Delete
* @return arrayJson
    {
        "message": "Se borra una cuenta"
    }
*/
