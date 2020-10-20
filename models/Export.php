<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Exception;

/**
 * Esta clase nos ayuda con el armado de una extructura de documento a exportar "Export".
 */
class Export
{

    const NACIONALIDAD_ARGENTINA = 1;

    public static function exportCtaSaldo($params){
        $resultado = [];
        $ctasaldo = '';
        $lista_prestacion = [];
        $ids = '';
        $sub_sucursalesids = '';
        $subSucursalSearch = new SubSucursalSearch();
        
        /******** Instancia con Persona ************/
        //hacemos instancia con todas las persoans
        foreach ($params as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $ids .= (empty($ids))?$value['personaid']:','.$value['personaid'];
        }
        $lista_persona = \Yii::$app->registral->buscarPersona(["ids"=>$ids]);
        //validamos si la lista tiene personas
        if(count($lista_persona['resultado'])<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de personas');
        }
        
        //vamos a vincular la lista de persona con sus prestaciones correspondientes
        $i=0;
        foreach ($lista_persona['resultado'] as $persona) {
            foreach ($params as $value) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $params[$i]['apellido'] = $persona['apellido'];
                    $params[$i]['nombre'] = $persona['nombre'];
                    $params[$i]['nro_documento'] = $persona['nro_documento'];
                    $params[$i]['tipo_documentoid'] = $persona['tipo_documentoid'];
                    $params[$i]['fecha_nacimiento'] = $persona['fecha_nacimiento'];
                    $params[$i]['sexo'] = $persona['sexo'];
                    $params[$i]['nacionalidadid'] = $persona['nacionalidadid'];
                    $params[$i]['lugar']['calle'] = $persona['lugar']['calle'];
                    $params[$i]['lugar']['altura'] = $persona['lugar']['altura'];
                    $params[$i]['lugar']['localidad'] = $persona['lugar']['localidad'];
                    $params[$i]['lugar']['codigo_postal'] = $persona['lugar']['codigo_postal'];
                    $params[$i]['cuil'] = $persona['cuil'];
                    break;
                }
            }
            $i++;
        }
        
        /***** Instancia con Sub-Sucursales *****/
        //hacemos instancia con todas las sub-sucursales
        foreach ($params as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $sub_sucursalesids .= (empty($sub_sucursalesids))?$value['sub_sucursalid']:','.$value['sub_sucursalid'];
        }
        $lista_sub_sucursales = $subSucursalSearch->search(['ids' => $sub_sucursalesids]);
        
        //vamos a vincular las sub_sucursales correspondiente a cada prestacion
         $i=0;
        foreach ($params as $value) {
            foreach ($lista_sub_sucursales as $sub_sucursal) {
                if(isset($sub_sucursal['id']) && isset($value['sub_sucursalid']) && $sub_sucursal['id']==$value['sub_sucursalid']){
                    $params[$i]['sub_sucursal'] = $sub_sucursal;
                    break;
                }
            }
            $i++;
        }
        
        /***** Se arma el docuemnto .txt cta-saldo*********/
        foreach ($params as $value) {
            //Se define la nacionalidad
            if($value['nacionalidadid']==self::NACIONALIDAD_ARGENTINA){
                $nac = 'A';
            }else{
                $nac = 'E';
            }
            $prestacion['personaid'] = $value['personaid'];
            $prestacion['monto'] = $value['saldo'];
            $prestacion['proposito'] = (isset($value['proposito']) && !empty($value['proposito']))?$value['proposito']:'';
            $prestacion['observacion'] = (isset($value['observacion']) && !empty($value['observacion']))?$value['observacion']:'Se crea en exportacion de CtaSaldo';;
            $prestacion['sub_sucursalid'] = $value['sub_sucursal']['id'];
            $prestacion['estado'] = Prestacion::SIN_CBU;
            $prestacion['fecha_ingreso'] = (isset($value['fecha_ingreso']) && !empty($value['fecha_ingreso']))?$value['fecha_ingreso']:date('Y-m-d');
            $lista_prestacion[] = $prestacion;
            
            //Estructura de CTASLDO.TXT
            $convenio_apellido = str_pad('8180'.strtoupper($value['apellido']), 34);
            $nombre = str_pad('8180'.strtoupper($value['nombre']), 16);
            $tipo_documento = str_pad($value['tipo_documentoid'], 3, "0", STR_PAD_LEFT);
            $nro_documento = str_pad($value['nro_documento'], 17, "0", STR_PAD_LEFT);
            $nacionalidad = str_pad($nac, 3, "0", STR_PAD_LEFT);
            $fecha_nacimiento = \DateTime::createFromFormat('Y-m-d', $value['fecha_nacimiento'])->format('dmY');
            $sexo = ($value['sexo']=='Masculino')?'M':'F';
            $estado_civil = 'S';
            $calle = str_pad(strtoupper($value['lugar']['calle']), 19);
            $altura = str_pad((str_pad($value['lugar']['altura'], 5, "0", STR_PAD_LEFT)),9);
            $localidad = str_pad(strtoupper($value['lugar']['localidad']), 30);
            $codigo_postal = str_pad(str_pad($value['lugar']['codigo_postal'].'16'.'2', 8, "0", STR_PAD_LEFT), 38); //codigopostal.provinciaid.tipocuenta
            $cuil = str_pad('008'.$value['cuil'].str_pad($value['saldo'], 5, "0", STR_PAD_LEFT), 37); //tipoincripcion.cuil.saldo
            $sucursal = str_pad(date('dmY').$value['sub_sucursal']['codigo'], 23); //tipoincripcion.cuil.saldo
            $sucursal_codigo_postal = str_pad(str_pad($value['sub_sucursal']['codigo_postal'], 5, "0", STR_PAD_LEFT), 30).'000000000                       '; //tipoincripcion.cuil.saldo

            $linea_ctasaldo = $convenio_apellido.$nombre.$tipo_documento.$nro_documento.$nacionalidad.$fecha_nacimiento.$sexo.$estado_civil.$calle.$altura.$localidad.$codigo_postal.$cuil.$sucursal.$sucursal_codigo_postal;
            $ctasaldo .= (empty($ctasaldo))?$linea_ctasaldo:"\n".$linea_ctasaldo;
            
        }
        
        $resultado['cant_prestaciones'] = Prestacion::crearPrestaciones($lista_prestacion);
        $resultado['ctasaldo'] = $ctasaldo;
        
        return $resultado;
    }
    
    /**
     * Se registrar prestacion con estado pendiente. Esto nos permite seguir trabajando sobre una exportacion de ctaSaldo
     * @param array $params
     * @return string
     */
    public static function guardarCtaSaldo($params){
        $resultado = [];
        $ctasaldo = [];
        $lista_prestacion = [];
        $ids = '';
        
        /******** Instancia con Persona ************/
        //hacemos instancia con todas las persoans
        foreach ($params as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $ids .= (empty($ids))?$value['personaid']:','.$value['personaid'];
        }
        $lista_persona = \Yii::$app->registral->buscarPersona(["ids"=>$ids]);
        //validamos si la lista tiene personas
        if(count($lista_persona['resultado'])<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de personas');
        }
        
        //vamos a vincular la lista de persona con sus prestaciones correspondientes
        $i=0;
        foreach ($lista_persona['resultado'] as $persona) {
            foreach ($params as $value) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $params[$i]['apellido'] = $persona['apellido'];
                    $params[$i]['nombre'] = $persona['nombre'];
                    $params[$i]['cuil'] = $persona['cuil'];
                    break;
                }
            }
            $i++;
        }
        
        
        foreach ($params as $value) {
            $prestacion['personaid'] = $value['personaid'];
            $prestacion['nombre'] = $value['nombre'];
            $prestacion['apellido'] = $value['apellido'];
            $prestacion['cuil'] = $value['cuil'];
            $prestacion['monto'] = $value['saldo'];
            $prestacion['proposito'] = (isset($value['proposito']) && !empty($value['proposito']))?$value['proposito']:'';
            $prestacion['observacion'] = (isset($value['observacion']) && !empty($value['observacion']))?$value['observacion']:'Se crea en exportacion de CtaSaldo';;
            $prestacion['sub_sucursalid'] = $value['sub_sucursalid'];
            $prestacion['estado'] = Prestacion::PREPARADO_A_EXPORTAR;
            $prestacion['fecha_ingreso'] = (isset($value['fecha_ingreso']) && !empty($value['fecha_ingreso']))?$value['fecha_ingreso']:date('Y-m-d');
            $lista_prestacion[] = $prestacion;
        }
        
        $resultado = Prestacion::crearPrestaciones($lista_prestacion);
        
        return $resultado;
    }
    
    static function verCtaSaldo() {
        $ids='';
        $sub_sucursales_ids='';
        $prestaciones = Prestacion::find()->asArray()->where(['estado'=> Prestacion::PREPARADO_A_EXPORTAR])->all();
        
        
        /***************** Instancias con atributos externos ************/
        /******** Instancia con Persona ***************************/
        //hacemos instancia con todas las persoans
        foreach ($prestaciones as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $ids .= (empty($ids))?$value['personaid']:','.$value['personaid'];
        }
        $lista_persona = \Yii::$app->registral->buscarPersona(["ids"=>$ids]);
        //validamos si la lista tiene personas
        if(count($lista_persona['resultado'])<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de personas');
        }
        
        /***** Instancia con Sub-Sucursales *****/
        //hacemos instancia con todas las sub-sucursales
        foreach ($prestaciones as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $sub_sucursales_ids .= (empty($sub_sucursales_ids))?$value['sub_sucursalid']:','.$value['sub_sucursalid'];
        }
        $subSucursalSearch = new SubSucursalSearch();
        $lista_sub_sucursales = $subSucursalSearch->search(['ids' => $sub_sucursales_ids]);
        //
        if(count($lista_sub_sucursales)<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de sub-sucursales');
        }
        
        //vamos a vincular la lista de persona con sus prestaciones correspondientes
        $i=0;
        foreach ($prestaciones as $value) {
            //Persona
            foreach ($lista_persona['resultado'] as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $prestaciones[$i]['apellido'] = $persona['apellido'];
                    $prestaciones[$i]['nombre'] = $persona['nombre'];
                    $prestaciones[$i]['cuil'] = $persona['cuil'];
                    $prestaciones[$i]['lugar'] = $persona['lugar'];
                    break;
                }
            }
            
            //sub-sucursales
            foreach ($lista_sub_sucursales as $sub_sucursal) {
                if(isset($sub_sucursal['id']) && isset($value['sub_sucursalid']) && $sub_sucursal['id']==$value['sub_sucursalid']){
                    $prestaciones[$i]['sub_sucursal'] = $sub_sucursal;
                    break;
                }
            }
            $i++;
        }
        
        /**************Fin de instacia de atributos externos*****************/
        
        return $prestaciones;
    }
}
