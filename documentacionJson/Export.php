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
            "id": 7,
            "lista_ids": "27,28,29,30,31,32,33,34,35,36,37,38,39,40",
            "cantidad": 14,
            "tipo": "ctasaldo",
            "export_at": "2021-06-11 10:47:32",
            "cantidad_inicial": 14,
            "cantidad_actual": 12,
            "tipo_convenio": "8180",
            "importados": 12
        },
        {...},
        {
            "id": 8,
            "lista_ids": "326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,371,372,373,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396",
            "cantidad": 71,
            "tipo": "ctasaldo",
            "export_at": "2021-06-15 17:14:28",
            "cantidad_inicial": 71,
            "cantidad_actual": 70,
            "tipo_convenio": "8180",
            "importados": 70
        },
    ]
}
*/

/**** Para re-exportar ****/
/**
* @url http://api.gcb.local/api/exports/2
* @method GET
* @return array {"exportacion":"texto plano"}
*/
