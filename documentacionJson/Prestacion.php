<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/prestacions
* @params tipo_convenioid=integer
* @params estado=0 SIN CBU
* @params estado=1 CON CBU
* @params estado=2 EN TESORERIA
* @params estado=4 PREPARADO PARA EXPORTAR
* @method GET
* @arrayReturn
{[
   {
        "id": 3668,
        "apellido": "Larrosa",
        "nombre": "Miguel Angel",
        "nro_documento": "34075149",
        "tipo_documentoid": 1,
        "fecha_nacimiento": "1988-10-04",
        "sexo": "Masculino",
        "nacionalidadid": 1,
        "nacionalidad": "A",
        "cuil": "20340751494",
        "telefono": "",
        "celular": "",
        "email": "",
        "lugar": {
            "calle": "heroes de malvinas",
            "altura": "",
            "localidad": "Ministro Ramos Mexia",
            "codigo_postal": 8534,
            "barrio": "",
            "depto": "",
            "piso": "",
            "escalera": ""
        },
        "prestacion": {
            "id": 1314,
            "monto": 20000,
            "create_at": "2021-09-23 11:09:09",
            "proposito": null,
            "observacion": "123123",
            "sub_sucursalid": 1,
            "personaid": 3668,
            "estado": 4,
            "fecha_ingreso": "2021-09-23",
            "tipo_convenioid": 2,
            "exportid": null,
            "sucursal": {
                "id": 1,
                "localidad": "Allen",
                "codigo_postal": "8328",
                "codigo": "161014",
                "sucursalid": 14,
                "nombre": "Allen (Suc. Allen)",
                "sucursal_codigo": "265"
            },
            "tipo_convenio": "8277",
            "export_at": "",
            "localidad": "Allen",
            "codigo_postal": "8328",
            "codigo": "161014",
            "sucursalid": 14,
            "nombre": "Allen (Suc. Allen)",
            "sucursal_codigo": "265"
        }
    },
   {
        "id": 2569,
        "apellido": "Cortes",
        "nombre": "Gustavo Gabriel",
        "nro_documento": "30874888",
        "tipo_documentoid": 1,
        "fecha_nacimiento": "1984-05-01",
        "sexo": "Masculino",
        "nacionalidadid": 1,
        "nacionalidad": "A",
        "cuil": "20308748880",
        "telefono": "",
        "celular": "",
        "email": "",
        "lugar": {
            "calle": "roca negra 406",
            "altura": "lote 22",
            "localidad": "San Carlos De Bariloche",
            "codigo_postal": 8400,
            "barrio": "",
            "depto": "",
            "piso": "",
            "escalera": ""
        },
        "prestacion": {
            "id": 28,
            "monto": 35000,
            "create_at": "2021-06-10 14:06:10",
            "proposito": null,
            "observacion": "",
            "sub_sucursalid": 2,
            "personaid": 2569,
            "estado": 1,
            "fecha_ingreso": "2021-06-09",
            "tipo_convenioid": 1,
            "exportid": 7,
            "sucursal": {
                "id": 2,
                "localidad": "Bariloche",
                "codigo_postal": "8400",
                "codigo": "161399",
                "sucursalid": 3,
                "nombre": "Bariloche (Suc. Bariloche)",
                "sucursal_codigo": "255"
            },
            "tipo_convenio": "8180",
            "export_at": "2021-06-11",
            "localidad": "Bariloche",
            "codigo_postal": "8400",
            "codigo": "161399",
            "sucursalid": 3,
            "nombre": "Bariloche (Suc. Bariloche)",
            "sucursal_codigo": "255"
        }
    }
]}
*/

/*****Para crear****
* @url http://api.gcb.local/api/prestacions 
* @method POST
* @param arrayJson
{
   "monto":"5000",
   "proposito":"Un Proposito",
   "sub_sucursalid":"1",
   "personaid":"1212",
   "fecha_ingreso":"2020-06-06",
   "observacion":"una obser",
   "tipo_convenioid":"1"
}
* @return
{
   "message": "Se crea una prestacion",
   "id": 1
}
**/

/**** Para modificar*****
* @url http://api.gcb.local/api/prestacions/borrar-pendiente/{personaid} 
* @method DELETE
* @return String
**/

/**** Exportar txt CTASALDO ****/
/**
* Se exporta CTASLDO.txt y se registran las prestaciones con estado = 0 (Prestaciones de personas sin CBU) 
* @url http://api.gcb.local/api/prestacions/exportar-convenio
* @method POST
* @params 
* @arrayReturn
    {
        "message": "Se crea el archivo CTASLDO.txt",
        "cuenta_saldo": "8180GONZáLEZ                     8180VICTORIA MARGARITA0010000000002385126600A30121982FSCALLE              00327    VIEDMA                        08500162                              0082023851266905000                  05112020265            08328                         000000000                       "
    }
*/

