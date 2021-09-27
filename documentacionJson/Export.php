<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/api/exports
* @url http://api.gcb.local/api/exports?sort=-export_at se ordena la lista por fecha de exportacion
* @url http://api.gcb.local/api/exports?export_at_desde=2021-01-11&export_at_hasta=2021-04-10 Se filtra por fecha

* @method GET
* @arrayReturn
{
    "pagesize": 10,
    "pages": 1,
    "total_filtrado": 1,
    "resultado": [
        {
            "id": 1,
            "lista_ids": "1,2,3",
            "tipo": "interbanking",
            "export_at": "2021-05-06 14:24:21",
            "cantidad":13,
            tipo_convenio: ""
        },
        {...},
        {
            "id": 1,
            "lista_ids": "1,2,3",
            "tipo": "ctasaldo",
            "export_at": "2021-05-06 14:24:21",
            "cantidad":210,
            tipo_convenio: "8277"
        }
    ]
}
*/

/**** Para re-exportar ****/
/**
* @url http://api.gcb.local/api/exports/2
* @method GET
* @return array {"exportacion":"texto plano"}
*/
