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
    "nombre": "Victoria Margarita",
    "apellido": "González",
    "nro_documento": "23851266",
    "cuil": "20068512669",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MTQyMDYwMjMsInVzdWFyaW8iOiJhZG1pbiIsInVpZCI6MX0.gB1lraNxeF-6wsBpf4X0VA2Y8AypQKdkPk-9dxdupWA",
    "username": "admin",
    "rol": "soporte"
}
**/



/*****Para crear usuario****
* @url http://api.gcb.local/usuarios 
* @method POST
* @param arrayJson
# Con persona existente
{
	"personaid":2,
	"usuario":{
		"personaid":2,
		"username":"cep11p",
		"password":"carlos",
		"email":"cep11p@correo.com",
		"localidadid":2626,
		"rol":"soporte"
	}
}
# Con persona nueva
{
	"nombre":"Carlos",
	"apellido":"Peralta",
	"nro_documento":"36123456",
	"cuil":"20361234569",
	"usuario":{
		"username":"cperez",
		"password":"carlos",
		"email":"cperez@correo.com",
		"localidadid":2626,
		"rol":"soporte"
	}
}
**/

/****** Para visualizar*****
* @url http://api.gcb.local/usuarios/2
* @method GET
* @return arrayJson
{
    "id": 2,
    "username": "admin",
    "email": "admin@correo.com",
    "confirmed_at": 1556894840,
    "unconfirmed_email": null,
    "blocked_at": null,
    "registration_ip": "172.18.0.2",
    "created_at": 1556894840,
    "updated_at": 1607700159,
    "flags": 0,
    "last_login_at": 1610453141,
    "personaid": 1,
    "fecha_baja": "",
    "baja": false,
    "descripcion_baja": "",
    "localidadid": 2626,
    "nombre": "Victoria Margarita",
    "apellido": "González",
    "nro_documento": "23851266",
    "cuil": "20068512669",
    "localidad": "Rio Colorado"
}
*/

/**** Para modificar*****
* @url http://api.gps.local/usuarios/{$id} 
* @method PUT
* @param arrayJson
{
    "username": "andres",
    "email": "uncorreo1@correo.com",
    "password": "newpass",
    "localidadid": 2626
}
**/

/**** Dar de baja un Usuarios*****
* @url http://api.gcb.local/usuarios/baja/47 
* @method PUT
* @param arrayJson
{
  "baja":true,
	"descripcion_baja":"Esto es una descripcion de baja de usuario"
}
**/

/** Buscar a un usuario por nro de cuil
 * @url http://api.gcb.local/usuarios/buscar-persona-por-cuil/20320542389
 * @method GET
 * @return arrayJson
 * 
 {
    "success": true,
    "resultado": {
        "id": 2,
        "nro_documento": "32054238",
        "cuil": "20320542389",
        "nombre": "Isabel Sofía",
        "apellido": "Rodríguez",
        "usuario": {
            "id": 13,
            "username": "cep11p",
            "email": "cep11p@correo.com",
            "auth_key": "aN1ar_QzmaG90RK8vGo3IQdwI6ylIPo3",
            "confirmed_at": 1614092528,
            "unconfirmed_email": null,
            "blocked_at": null,
            "registration_ip": "172.20.0.8",
            "created_at": 1614092528,
            "updated_at": 1614092528,
            "flags": 0,
            "last_login_at": null,
            "personaid": 2,
            "localidadid": 2626
        }
    }
  }
 **/

/**** Crear Asignaciones a Usuarios*****
* @url http://api.gcb.local/usuarios/crear-asignacion/
* @method POST
* @param arrayJson
{
	"usuarioid": 15,
	"lista_permiso":[
		{"name":"cuenta_bps_importar"},
		{"name":"cuenta_ver"}
    ]
}