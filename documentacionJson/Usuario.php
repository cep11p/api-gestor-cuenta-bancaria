<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gestor-inventario.local/proveedors
* @method GET
* @arrayReturn
*/

/*****Login****
* @url http://api.gcb.local/usuarios/login
* @method POST
* @param arrayJson
{
  "username":"admin",
  "password_hash":"admins"
}
* @return
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MDE5MjkzNTQsInVzdWFyaW8iOiJhZG1pbiIsInVpZCI6MX0.tH8DHH8vRTjPyNPHiv5zFkXOey_TVARO8NBA1YSkB04",
    "username": "admin"
}
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
