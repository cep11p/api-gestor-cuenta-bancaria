<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Exception;

/**
 * Esta clase nos ayuda con el armado de una extructura de documento a exportar "Export".
 */
class CuentaSaldo
{

    const NACIONALIDAD_ARGENTINA = 1;

    /**
     * Se exportan prestacion es una archivo llamado CTASLDO.TXT
     * @param array $params
     * @return string
     * @throws \yii\web\HttpException
     */
    public static function exportCtaSaldo($params){
        $resultado = [];
        $errors = [];
        $lista_prestacion_correcta = [];
        
        /***** Armamos la instancia completa con Persona y Sub-Sucursal*****/
        $lista_persona_prestacion = self::setInstanciaSubSucursalYPersona($params);
        
        /***** Se validan y se registran las prestaciones *********/
        foreach ($lista_persona_prestacion as $value) {    
            //Registramos la prestacion
            $model = new Prestacion();
            $model->personaid = (isset($value['id']))?$value['id']:null;
            $model->monto = (isset($value['prestacion']['monto']))?$value['prestacion']['monto']:null;
            $model->create_at = date('Y-m-d H:m:i');
            $model->observacion = 'Se crea en exportacion de CtaSaldo';
            $model->sub_sucursalid = (isset($value['prestacion']['sub_sucursalid']))?$value['prestacion']['sub_sucursalid']:null;
            $model->estado = Prestacion::SIN_CBU;
            $model->fecha_ingreso =(isset($value['prestacion']['fecha_ingreso']) && !empty($value['prestacion']['fecha_ingreso']))?$value['prestacion']['fecha_ingreso']:date('Y-m-d');
            
            if(!$model->save()){
                $error = $model->errors;
                $error['persona'] = $value['nombre']." ".$value['apellido']." cuil:".$value['cuil'];
                $errors[] = $error;
            }
        }
        //si hay errores notificamos
        if(!empty($errors)){
            throw new \yii\web\HttpException(400, json_encode($errors));
        }
        
        //Seteamos el txt a exportar
        $resultado = self::setCuentaSaldoTxt($lista_persona_prestacion);
        
        
        return $resultado;
    }

    /**
     * Se arma CTASLDO.TXT para exportar la prestaciones registradas
     * @param array $lista_prestacion
     * @return string
     */
    static function setCuentaSaldoTxt($lista_prestacion) {
        $ctasaldo = '';
        $errors = [];
        foreach ($lista_prestacion as $value) {
            
            /*********** Validamos CtaSldo ***********/
            //La longitud de la calle no puede ser mayor a 19
            if(strlen($value['lugar']['calle'])>19){
                $error['calle'] = 'La calle no puede superar los 19 caracteres.';
                $error['persona'] = $value['nombre']." ".$value['apellido']." cuil:".$value['cuil'];
                $errors[] = $error;
            }
            
            if(!isset($value['lugar']['altura']) || empty($value['lugar']['altura'])){
                $error['altura'] = 'El campo número se encuentra vacio';
                $error['persona'] = $value['nombre']." ".$value['apellido']." cuil:".$value['cuil'];
                $errors[] = $error;
            }
            
            /************* Fin de validacion CtaSldo ***************/
            
            //Estructura de CTASLDO.TXT
            $convenio_apellido = str_pad('8180'.strtoupper(\app\components\Help::quitar_tildes($value['apellido'])), 34);
            $nombre = str_pad(strtoupper(\app\components\Help::quitar_tildes($value['nombre'])), 16);
            $tipo_documento = str_pad($value['tipo_documentoid'], 3, "0", STR_PAD_LEFT);
            $nro_documento = str_pad($value['nro_documento'], 17, "0", STR_PAD_LEFT);
            $nacionalidad = str_pad($value['nacionalidad'], 3, "0", STR_PAD_LEFT);
            $fecha_nacimiento = \DateTime::createFromFormat('Y-m-d', $value['fecha_nacimiento'])->format('dmY');
            $sexo = ($value['sexo']=='Masculino')?'M':'F';
            $estado_civil = 'S';
            $calle = str_pad(strtoupper(\app\components\Help::quitar_tildes($value['lugar']['calle'])), 19);
            $altura = str_pad((str_pad($value['lugar']['altura'], 5, "0", STR_PAD_LEFT)),9);
            $localidad = str_pad(strtoupper($value['lugar']['localidad']), 30);
            $codigo_postal = str_pad(str_pad($value['lugar']['codigo_postal'].'16'.'2', 8, "0", STR_PAD_LEFT), 38); //codigopostal.provinciaid.tipocuenta
            $cuil = str_pad('008'.$value['cuil'].str_pad($value['prestacion']['monto'], 5, "0", STR_PAD_LEFT), 37); //tipoincripcion.cuil.saldo
            $sucursal = str_pad(date('dmY').$value['prestacion']['sucursal_codigo'], 23); //fecha.sucursal_codigo
            $sucursal_codigo_postal = str_pad(str_pad($value['prestacion']['codigo_postal'], 5, "0", STR_PAD_LEFT), 30).'000000000                       '; //sub_sucursal[codigo_postal]

            $linea_ctasaldo = $convenio_apellido.$nombre.$tipo_documento.$nro_documento.$nacionalidad.$fecha_nacimiento.$sexo.$estado_civil.$calle.$altura.$localidad.$codigo_postal.$cuil.$sucursal.$sucursal_codigo_postal;
            $ctasaldo .= (empty($ctasaldo))?$linea_ctasaldo:"\n".$linea_ctasaldo;
            
        }
        
        //si hay errores notificamos
        if(!empty($errors)){
            throw new \yii\web\HttpException(400, json_encode($errors));
        }
        
        return $ctasaldo;
    }
    
    /**
     * Se vinculan los datos de Persona y SubSucursal
     * @param array $params
     * @return Array
        (
            [0] => Array
                (
                    [id] => 1
                    [apellido] => González
                    [nombre] => Victoria Margarita
                    [nro_documento] => 23851266
                    [tipo_documentoid] => 1
                    [fecha_nacimiento] => 1982-12-30
                    [sexo] => Femenino
                    [nacionalidadid] => 1
                    [nacionalidad] => A
                    [lugar] => Array
                        (
                            [calle] => escalera 39 planta baja dpto. d b°guido
                            [altura] => 
                            [localidad] => Viedma
                            [codigo_postal] => 8500
                        )

                    [cuil] => 20238512669
                    [prestacion] => Array
                        (
                            [sub_sucursalid] => 1
                            [localidad] => Allen
                            [codigo_postal] => 8328
                            [codigo] => 161014
                            [sucursalid] => 14
                            [nombre] => Allen (Suc. Allen)
                            [sucursal_codigo] => 265
                        )

                )
        )
     * @throws \yii\web\HttpException
     */
    public static function setInstanciaSubSucursalYPersona($params) {
        $subSucursalSearch = new SubSucursalSearch();
        $lista_persona_prestacion = [];
        $sub_sucursalesids = '';
        $ids = '';
        
        /******** Instancia con Persona ************/
        //hacemos instancia con todas las persoans
        foreach ($params as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            if(isset($value['id'])){
                $ids .= (empty($ids))?$value['id']:','.$value['id'];
            }else{
                throw new \yii\web\HttpException(400,'No se permite una persona sin id de una persona');
            }
        }
        $lista_persona = \Yii::$app->registral->buscarPersona(["ids"=>$ids]);
        //validamos si la lista tiene personas
        if(count($lista_persona['resultado'])<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de personas');
        }
        
        //vamos a vincular la lista de persona con sus prestaciones correspondientes
        $i=0;
        foreach ($params as $value) {
            foreach ($lista_persona['resultado'] as $persona) {
                if(isset($persona['id']) && isset($value['id']) && $persona['id']==$value['id']){
                    $lista_persona_prestacion[$i]['id'] = $persona['id'];
                    $lista_persona_prestacion[$i]['apellido'] = $persona['apellido'];
                    $lista_persona_prestacion[$i]['nombre'] = $persona['nombre'];
                    $lista_persona_prestacion[$i]['nro_documento'] = $persona['nro_documento'];
                    $lista_persona_prestacion[$i]['tipo_documentoid'] = $persona['tipo_documentoid'];
                    $lista_persona_prestacion[$i]['fecha_nacimiento'] = $persona['fecha_nacimiento'];
                    $lista_persona_prestacion[$i]['sexo'] = $persona['sexo'];
                    $lista_persona_prestacion[$i]['nacionalidadid'] = $persona['nacionalidadid'];
                    $lista_persona_prestacion[$i]['nacionalidad'] = ($persona['nacionalidadid']==self::NACIONALIDAD_ARGENTINA)?'A':'E';
                    $lista_persona_prestacion[$i]['lugar']['calle'] = $persona['lugar']['calle'];
                    $lista_persona_prestacion[$i]['lugar']['altura'] = $persona['lugar']['altura'];
                    $lista_persona_prestacion[$i]['lugar']['localidad'] = $persona['lugar']['localidad'];
                    $lista_persona_prestacion[$i]['lugar']['codigo_postal'] = $persona['lugar']['codigo_postal'];
                    $lista_persona_prestacion[$i]['cuil'] = $persona['cuil'];
                    break;
                }
            }
            $i++;
        }
        
        /***** Instancia con Sub-Sucursales *****/
        //hacemos instancia con todas las sub-sucursales
        foreach ($params as $value) {
            if(isset($value['prestacion']['sub_sucursalid']) && is_int($value['prestacion']['sub_sucursalid'])){
                $sub_sucursalesids .= (empty($sub_sucursalesids))?$value['prestacion']['sub_sucursalid']:','.$value['prestacion']['sub_sucursalid'];
            }else{
                throw new \yii\web\HttpException(400,'No se permite una prestacion sin sub_sucursalid');
            }
        }
        $lista_sub_sucursales = $subSucursalSearch->search(['ids' => $sub_sucursalesids]);
        
        
        //vamos a vincular las sub_sucursales correspondiente a cada prestacion
         $i=0;
        foreach ($params as $value) {
            foreach ($lista_sub_sucursales as $sub_sucursal) {
                if(isset($sub_sucursal['id']) && isset($value['prestacion']['sub_sucursalid']) && $sub_sucursal['id']==$value['prestacion']['sub_sucursalid']){
                    unset($sub_sucursal['id']);
                    $lista_persona_prestacion[$i]['prestacion']=ArrayHelper::merge($params[$i]['prestacion'], $sub_sucursal);
                    break;
                }
            }
            $i++;
        }
        
        return $lista_persona_prestacion;
    }
    
    /**
     * Se registrar prestacion con estado pendiente. Esto nos permite seguir trabajando sobre una exportacion de ctaSaldo
     * @param array $params
     * @return string
     */
    public static function guardarCtaSaldo($params){
        $resultado = [];
        $errors = [];
        $cant_registros = 0;
        /******** Instancia con Persona ************/
        $params = self::setInstanciaSubSucursalYPersona($params);
        
        
        /***** Se validan y se registran las prestaciones *********/
        foreach ($params as $value) {       
            //Registramos la prestacion
            $model = new Prestacion();
            $model->personaid = (isset($value['id']))?$value['id']:null;
            $model->monto = (isset($value['prestacion']['monto']))?$value['prestacion']['monto']:null;
            $model->create_at = date('Y-m-d H:m:i');
            $model->sub_sucursalid = (isset($value['prestacion']['sub_sucursalid']))?$value['prestacion']['sub_sucursalid']:null;
            $model->estado = Prestacion::PREPARADO_A_EXPORTAR;
            $model->fecha_ingreso =(isset($value['prestacion']['fecha_ingreso']) && !empty($value['prestacion']['fecha_ingreso']))?$value['prestacion']['fecha_ingreso']:date('Y-m-d');

            if(!$model->save()){
                $error = $model->errors;
                $error['persona'] = $value['nombre']." ".$value['apellido']." cuil:".$value['cuil'];
                $errors[] = $error;
            }else{
                $cant_registros++;
            }
        }
        
        $resultado['cant_registros'] = $cant_registros;
        $resultado['errors'] = $errors;
        
        return $resultado;
    }
    
    /**
     * Se vinsualizan las prestaciones con su datos de Persona y Sub_sucursal
     * @return array
     */
    static function verCtaSaldo() {
        $ids='';
        $sub_sucursales_ids='';
        $cuentaSaldo = array();
        $prestaciones = Prestacion::find()->asArray()->where(['estado'=> Prestacion::PREPARADO_A_EXPORTAR])->all();
        
        //armamos la estructura adecuada y coordinada con el frontend
        $i=0;
        foreach ($prestaciones as $value) {
            $cuentaSaldo[$i]['id'] = intval($value['personaid']);
            $cuentaSaldo[$i]['prestacion'] = $value;
            $cuentaSaldo[$i]['prestacion']['sub_sucursalid'] = intval($value['sub_sucursalid']);
            $i++;
        }        
        
        /***************** Instancias con atributos externos ************/
        $cuentaSaldo = self::setInstanciaSubSucursalYPersona($cuentaSaldo);
        
        /**************Fin de instacia de atributos externos*****************/
        
        return $cuentaSaldo;
    }
}
