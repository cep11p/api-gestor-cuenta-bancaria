<?php

/**** Para mostrar listado ****/
/**
* @url http://api.gcb.local/exports
* @url http://api.gcb.local/exports?sort=-export_at se ordena la lista por fecha de exportacion
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
            "export_at": "2021-05-06 14:24:21"
        },
        {...},
        {
            "id": 1,
            "lista_ids": "1,2,3",
            "tipo": "ctasaldo",
            "export_at": "2021-05-06 14:24:21"
        }
    ]
}
*/

/**** Para re-exportar ****/
/**
* @url http://api.gcb.local/exports/2
* @method GET
* @return array {"exportacion":"texto plano"}
*/
