<?php

/**** Exportar txt CTASALDO ****/
/**
* Se exporta interbanking.txt y se registran las cuentas con tesoreria_alta = 1 (Nos indica que ya fue dado de alta en tesoreria) 
* @url http://api.gcb.local/api/interbanking/exportar
* @method POST
* @arrayReturn
{
    *No se necesita parametros, ya que se busca un listado de cuentas que aun no fueron dadas de altas en tesoreria (exportado a interbankin)
}
*/
