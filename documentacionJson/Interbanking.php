<?php

/**** Exportar txt CTASALDO ****/
/**
* Se exporta interbanking.txt y se registran las cuentas con tesoreria_alta = 1 (Nos indica que ya fue dado de alta en tesoreria) 
* @url http://api.gcb.local/interbanking/exportar
* @method POST
* @arrayReturn
{
    "lista_cuenta":[
        {"id":1},
        {"id":2},
        {"id":3}
    ]
}
*/
