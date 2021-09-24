<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/prestacions
* @params tipo_convenioid=integer
* @method GET
* @arrayReturn
{[
   {
      "id": 27,
      "monto": 45000,
      "create_at": "2021-06-10 14:06:10",
      "proposito": null,
      "observacion": null,
      "sub_sucursalid": 15,
      "personaid": 2568,
      "estado": 0,
      "fecha_ingreso": "2021-06-09",
      "tipo_convenioid": 1,
      "exportid": 7,
      "sucursal": {
            "id": 15,
            "localidad": "Villa Regina",
            "codigo_postal": "8336",
            "codigo": "161452",
            "sucursalid": 4,
            "nombre": "Villa Regina (Suc. Villa Regina)",
            "sucursal_codigo": "253"
      },
      "tipo_convenio": "8180",
      "export_at": "2021-06-11"
   },
   {
      "id": 28,
      "monto": 35000,
      "create_at": "2021-06-10 14:06:10",
      "proposito": null,
      "observacion": null,
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
      "export_at": "2021-06-11"
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

