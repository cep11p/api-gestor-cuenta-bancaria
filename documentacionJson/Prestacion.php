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

