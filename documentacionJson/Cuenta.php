<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/cuentas
* @url http://api.gcb.local/api/cuentas?ids=1,2,3 url con filtrado de ids
* @url http://api.gcb.local/api/cuentas?global_param=27351545475 url con filtro cuil, nombre, apellido o nro de documento
* @url http://api.gcb.local/api/cuentas?fecha_desde=2021-01-11&fecha_hasta=2021-04-10
* @method GET
* @arrayReturn
{
    "pagesize": 20,
    "pages": 3,
    "total_filtrado": 59,
    "resultado": [
        {
            "id": 5104,
            "cbu": "0340250608122046943005",
            "personaid": 5198,
            "bancoid": 1,
            "tipo_cuentaid": 2,
            "create_at": "2021-09-28 12:58:31",
            "tesoreria_alta": 0,
            "sub_sucursalid": null,
            "import_at": "",
            "tipo_convenioid": null,
            "banco": "Banco Patagonia S.A.",
            "tipo_cuenta": "Caja de Ahorro",
            "origen_convenio": false,
            "tipo_convenio": "",
            "apellido": "Laguna",
            "nombre": "Esteban Daniel",
            "cuil": "20224923113",
            "nro_documento": "22492311",
            "fecha_nacimiento": "1971-11-02",
            "estado_civil": "Soltero/a",
            "sexo": "Masculino",
            "telefono": "",
            "celular": "",
            "email": "",
            "sucursal": "",
            "lugar": {
                "id": 934,
                "nombre": "",
                "calle": "del pehuen",
                "altura": "1396",
                "localidadid": 2640,
                "latitud": "",
                "longitud": "",
                "barrio": "jardin",
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
            "id": 5091,
            "cbu": "0340255108383003335006",
            "personaid": 4425,
            "bancoid": 1,
            "tipo_cuentaid": 2,
            "create_at": "2021-09-27 12:09:51",
            "tesoreria_alta": 0,
            "sub_sucursalid": null,
            "import_at": "2021-09-27 12:09:51",
            "tipo_convenioid": 1,
            "banco": "Banco Patagonia S.A.",
            "tipo_cuenta": "Caja de Ahorro",
            "origen_convenio": true,
            "tipo_convenio": "8180",
            "apellido": "Quintero",
            "nombre": "Aldana Ailen",
            "cuil": "27432169214",
            "nro_documento": "43216921",
            "fecha_nacimiento": "2001-03-14",
            "estado_civil": "Soltero/a",
            "sexo": "Femenino",
            "telefono": "",
            "celular": "",
            "email": "",
            "sucursal": "",
            "lugar": {
                "id": 1918,
                "nombre": "",
                "calle": "guillermo osses",
                "altura": "600",
                "localidadid": 2539,
                "latitud": "",
                "longitud": "",
                "barrio": "boris furman",
                "piso": "",
                "depto": "",
                "escalera": "",
                "entre_calle_1": "",
                "entre_calle_2": "",
                "localidad": "San Carlos De Bariloche",
                "codigo_postal": 8400
            }
        }
    ]
]
*/

/*****Para crear****
* @url http://api.gcb.local/api/cuentas 
* @method POST
* @param arrayJson
    {
    "personaid":11,
    "bancoid": 1,
    "cbu":"0344567891234567891234"
    }
**/

/**** Para modificar*****
* @url http://api.gcb.local/api/cuentas/{$id} 
* @method PUT
* @param arrayJson
{
  "cbu":"0344567891234567891234",
  "sub_sucursalid": 2,
  "bancoid": 1,
  "tipo_cuentaid" : 1
}
**/

/****** Para visualizar*****
* @url http://api.gcb.local/api/cuentas/{$id} 
* @method GET
* @return arrayJson
*/

/****** Para borrar una cuenta *****
* @url http://api.gcb.local/api/cuentas/{$id} 
* @method Delete
* @return arrayJson
    {
        "message": "Se borra una cuenta"
    }
*/
