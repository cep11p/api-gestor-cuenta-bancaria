<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/prestacions
* @method GET
* @arrayReturn
*/

/*****Para crear****
* @url http://api.gcb.local/api/prestacions 
* @method POST
* @param arrayJson
* {
   "monto":"admin",
   "proposito":"admins",
   "sub_sucursalid":"admins",
   "personaid":"admins",
   "fecha_ingreso":"2020-06-06",
   "observacion":"admins"
 }
* @return
* {
   "message": "Se crea una prestacion",
   "id": 1
   }
**/

/**** Para modificar*****
* @url http://api.gcb.local/api/prestacions/borrar-pendiente/{personaid} 
* @method DELETE
* @return String
**/

