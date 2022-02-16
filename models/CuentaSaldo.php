<?php

namespace app\models;

use app\components\Help;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\base\Exception;

/**
 * Esta clase nos ayuda con el armado de una extructura de documento a exportar "Export".
 */
class CuentaSaldo
{

    const NACIONALIDAD_ARGENTINA = 1;

    /**
     * Registramos la exportacion de cuenta saldo
     *
     * @param [array] $params lista de prestaciones
     * @return void
     */
    public static function registrarExportacion($prestaciones){

        #registramos la exportacion
        $export = new Export();
        $export->cantidad = count($prestaciones);
        $export->tipo = Export::TIPO_CUENTA_SALDO;

        if(!$export->save()){
            throw new \yii\web\HttpException(400, json_encode($export->errors));
        }

        $lista_prestacionid = array ();
        #preparamos el atributo lista_ids
        foreach ($prestaciones as $value) {
            $lista_prestacionid[] = $value['prestacion']['id'];
        }

        #integramos la exportacion en cada prestacion
        Prestacion::updateAll(['exportid' => $export->id],['id' => $lista_prestacionid]);
    }

    /**
     * Esta funcion nos permite reexportar el archivo ctasaldo que ya fueron exportadas
     *
     * @param string $lista_ids
     * @return array
     */
    public static function reexportCtaSaldo($id){

        $prestaciones = Prestacion::find()->asArray()->where(['exportid'=>$id, 'estado' => Prestacion::SIN_CBU])->all();

        #Armamos la estructura necesaria para reutilzar el codigo siguiente
        $lista_prestacion = [];
        foreach ($prestaciones as $value) {
            $lista_prestacion[] = $value;
        }

        $lista_persona_prestacion = Prestacion::setInstanciaSubSucursalYPersona($lista_prestacion);
        $resultado = Prestacion::setCuentaSaldoTxt($lista_persona_prestacion);

        return $resultado;
    }

    /**
     * Esta funcion nos permite reexportar a todas la personas pendientes (Personas sin CBU que solicitan CBU)
     *
     * @param string $lista_ids
     * @return array
     */
    public static function exportarPendientesPorConvenio($tipo_convenioid){

        $prestaciones = Prestacion::find()->asArray()->where(['estado' => Prestacion::SIN_CBU, 'tipo_convenioid' => $tipo_convenioid])->all();

        #Armamos la estructura necesaria para reutilzar el codigo siguiente
        $lista_prestacion = [];
        foreach ($prestaciones as $value) {
            $value;
            $lista_prestacion[] = $value;
        }

        $lista_persona_prestacion = Prestacion::setInstanciaSubSucursalYPersona($lista_prestacion);
        $resultado = Prestacion::setCuentaSaldoTxt($lista_persona_prestacion);

        return $resultado;
    }

}
