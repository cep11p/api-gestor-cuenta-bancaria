<?php

namespace app\models;

use app\components\Help;
use Yii;
use \app\models\base\Prestacion as BasePrestacion;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prestacion".
 */
class Prestacion extends BasePrestacion
{
    const SIN_CBU=0;
    const CON_CBU=1;
    const EN_TESORERIA=2;
    const PREPARADO_A_EXPORTAR=4;
    const CONVENIO_8180=1;
    const CONVENIO_8277=2;

    #Escenario
    const SCENARIO_EXPORT_CUENTA_SALDO= 'exportando_cuenta_saldo';
    const SCENARIO_IMPORTADO_BPS = 'importado_bps';


    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # vinculamos el audit
                'bedezign\yii2\audit\AuditTrailBehavior',
            ]
        );
    }
    
    /**
     * Se registraran en la bd una lista de prestaciones
     * @param array $lista_prestaciones
     * @return array $resultado['cant_registros'], $resultado['errors']
     */
    static function crearPrestaciones($lista_prestaciones) {
        $cant_registros = 0;
        $resultado = array();
        $errors = array();
        
        foreach ($lista_prestaciones as $prestacion) {
            $model = new Prestacion();
            $model->personaid = intval($prestacion['personaid']);
            $model->monto = $prestacion['monto'];
            $model->create_at = date('Y-m-d H:m:i');
            $model->observacion = $prestacion['observacion'];
            $model->sub_sucursalid = $prestacion['sub_sucursalid'];
            $model->estado = $prestacion['estado'];
            $model->fecha_ingreso = $prestacion['fecha_ingreso'];
            
            if(!$model->save()){
                $error = $model->errors;
                $error['persona'] = $prestacion['nombre']." ".$prestacion['apellido']." cuil:".$prestacion['cuil'];
                $errors[] = $error;
            }else{
                $cant_registros++;
            }            
        }
        
        
        $resultado['cant_registros'] = $cant_registros;
        $resultado['errors'] = $errors;
                
        return $resultado;
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['personaid','validarImportado', 'on' => self::SCENARIO_IMPORTADO_BPS],
                ['personaid','validarPersona', 'on' => self::SCENARIO_DEFAULT],
                ['personaid','validarExportListaConvenio','on' => self::SCENARIO_EXPORT_CUENTA_SALDO],
            ]
        );
    }

    public function validarConvenioRule(){
        
        switch ($this->tipo_convenioid) {
            case  Prestacion::CONVENIO_8180:
                #Permisos para rol usuario_8180
                if (!\Yii::$app->user->can('usuario_8180', ['prestacionid' => $this->id])) {
                    throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
                }
                break;
            case  Prestacion::CONVENIO_8277:
                #Permisos para rol usuario_8277
                if (!\Yii::$app->user->can('usuario_8277', ['prestacionid' => $this->id])) {
                    throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
                }
                break;
        }
    }

    public function validarPersona(){
        #Chequemos si ya tiene cbu
        if(Cuenta::findOne(['personaid' => $this->personaid]) != NULL){
            $this->addError('personaid','La persona ya tiene CBU');
        }

        #Chequeamos que no tenga pendiente el pedido de cbu
        if(Prestacion::findOne(['personaid' => $this->personaid]) != NULL){
            $this->addError('personaid','La persona ya se encuentra en la lista de Cuenta Saldo. Por favor elimine la persona del listado (Cuenta Saldo)');
        }
    }

    public function validarImportado(){
        
        #no validamos la prestacion porque se valida previamente en cuenta

    }

    public function validarExportListaConvenio(){

        #Chequemos si ya tiene cbu
        if(Cuenta::findOne(['personaid' => $this->personaid]) != NULL){
            $this->addError('personaid','La persona ya tiene CBU');
        }

        #Chequeamos que no tenga pendiente el pedido de cbu
        if(Prestacion::findOne(['personaid' => $this->personaid, 'estado' => Prestacion::SIN_CBU]) != NULL){
            $this->addError('personaid','La persona tiene el pedido de CBU pendiente');
        }
    }


    
    public function setAttributesCustom($values) {
        parent::setAttributes($values);
        $this->create_at = date('Y-m-d H:m:i');
        
        if(empty($this->fecha_ingreso)){
            $this->fecha_ingreso = date('Y-m-d');
        }
        
        $this->estado = Prestacion::PREPARADO_A_EXPORTAR;
    }

    public static function setEstado($lista_persona){
        $ids = '';
        $prestacionSearch = new PrestacionSearch();

        /******** Instancia con Persona ***************************/
        //hacemos instancia con todas las persoans
        foreach ($lista_persona as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $ids .= (empty($ids))?$value['id']:','.$value['id'];
        }
        
        $lista_prestacion = $prestacionSearch->search(['persona_ids'=>$ids]);
        $lista_prestacion = (!empty($lista_prestacion['resultado']))?$lista_prestacion['resultado']:[];

        foreach ($lista_prestacion as $value) {
            $i=0;
            foreach ($lista_persona as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $lista_persona[$i]['sucursal'] = $value['sucursal']['sucursal_codigo'].' - '.$value['sucursal']['nombre'];
                    $lista_persona[$i]['tipo_convenio'] = $value['tipo_convenio'];

                    if($value['estado'] == Prestacion::SIN_CBU){
                        $lista_persona[$i]['convenio_pendiente'] = true;
                        $lista_persona[$i]['export_at'] = $value['export_at'];
                    }
                    if($value['estado'] == Prestacion::PREPARADO_A_EXPORTAR){
                        $lista_persona[$i]['para_exportar'] = true;
                    }
                    #Seteamos la observacion de la prestacion
                    $lista_persona[$i]['observacion'] = (isset($value['observacion']))?$value['observacion']:"";
                    break;
                }
                $i++;
            }
        }


        return $lista_persona;

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
        $personaids = '';
        
        /******** Instancia con Persona ************/
        //hacemos instancia con todas las persoans
        foreach ($params as $value) {
            $personaids .= (empty($personaids))?$value['personaid']:','.$value['personaid'];
        }
        //nos comunicamos con registrar para obtener lista de personas
        $lista_persona = \Yii::$app->registral->buscarPersona(["ids"=>$personaids]);
        //validamos si la lista tiene personas
        if(count($lista_persona['resultado'])<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de personas');
        }
        
        //vamos a vincular la lista de persona con sus prestaciones correspondientes
        $i=0;
        foreach ($params as $value) {
            foreach ($lista_persona['resultado'] as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $lista_persona_prestacion[$i]['id'] = $persona['id'];
                    $lista_persona_prestacion[$i]['apellido'] = $persona['apellido'];
                    $lista_persona_prestacion[$i]['nombre'] = $persona['nombre'];
                    $lista_persona_prestacion[$i]['nro_documento'] = $persona['nro_documento'];
                    $lista_persona_prestacion[$i]['tipo_documentoid'] = $persona['tipo_documentoid'];
                    $lista_persona_prestacion[$i]['fecha_nacimiento'] = $persona['fecha_nacimiento'];
                    $lista_persona_prestacion[$i]['sexo'] = $persona['sexo'];
                    $lista_persona_prestacion[$i]['nacionalidadid'] = $persona['nacionalidadid'];
                    $lista_persona_prestacion[$i]['nacionalidad'] = ($persona['nacionalidadid']==PersonaForm::NACIONALIDAD_ARGENTINA)?'A':'E';
                    $lista_persona_prestacion[$i]['cuil'] = $persona['cuil'];
                    $lista_persona_prestacion[$i]['telefono'] = $persona['telefono'];
                    $lista_persona_prestacion[$i]['celular'] = $persona['celular'];
                    $lista_persona_prestacion[$i]['email'] = $persona['email'];
                    $lista_persona_prestacion[$i]['prestacion'] = $value;
                    
                    if(!empty($persona['lugar'])){
                        $lista_persona_prestacion[$i]['lugar']['calle'] = $persona['lugar']['calle'];
                        $lista_persona_prestacion[$i]['lugar']['altura'] = $persona['lugar']['altura'];
                        $lista_persona_prestacion[$i]['lugar']['localidad'] = $persona['lugar']['localidad'];
                        $lista_persona_prestacion[$i]['lugar']['codigo_postal'] = $persona['lugar']['codigo_postal'];
                        $lista_persona_prestacion[$i]['lugar']['barrio'] = $persona['lugar']['barrio'];
                        $lista_persona_prestacion[$i]['lugar']['depto'] = $persona['lugar']['depto'];
                        $lista_persona_prestacion[$i]['lugar']['piso'] = $persona['lugar']['piso'];
                        $lista_persona_prestacion[$i]['lugar']['escalera'] = $persona['lugar']['escalera'];
                    }else{
                        unset($lista_persona_prestacion[$i]['lugar']);
                    }
                    break;
                }
            }
            $i++;
        }

        
        /***** Instancia con Sub-Sucursales *****/
        //hacemos instancia con todas las sub-sucursales
        foreach ($lista_persona_prestacion as $value) {
            if(isset($value['prestacion']['sub_sucursalid']) && is_int(intval($value['prestacion']['sub_sucursalid']))){
                $sub_sucursalesids .= (empty($sub_sucursalesids))?$value['prestacion']['sub_sucursalid']:','.$value['prestacion']['sub_sucursalid'];
            }else{
                throw new \yii\web\HttpException(400,'No se permite una prestacion sin sub_sucursalid');
            }
        }
        $lista_sub_sucursales = $subSucursalSearch->search(['ids' => $sub_sucursalesids]);
        
        //vamos a vincular las sub_sucursales correspondiente a cada prestacion
        $i=0;
        foreach ($lista_persona_prestacion as $value) {
            foreach ($lista_sub_sucursales as $sub_sucursal) {
                if(isset($sub_sucursal['id']) && isset($value['prestacion']['sub_sucursalid']) && $sub_sucursal['id']==$value['prestacion']['sub_sucursalid']){
                    unset($sub_sucursal['id']);
                    $lista_persona_prestacion[$i]['prestacion']=ArrayHelper::merge($lista_persona_prestacion[$i]['prestacion'], $sub_sucursal);
                    break;
                }
            }
            $i++;
        }
        
        return $lista_persona_prestacion;
    }

    public static function setDataPersona($params) {
        $personaids = '';
        
        /******** Instancia con Persona ************/
        //hacemos instancia con todas las persoans
        foreach ($params as $value) {
            $personaids .= (empty($personaids))?$value['personaid']:','.$value['personaid'];
        }
        //nos comunicamos con registrar para obtener lista de personas
        $lista_persona = \Yii::$app->registral->buscarPersona(["ids"=>$personaids]);
        //validamos si la lista tiene personas
        if(count($lista_persona['resultado'])<1){
            throw new \yii\web\HttpException(400,'Hubo problemas con obtener la lista de personas');
        }
        
        //vamos a vincular la lista de persona con sus prestaciones correspondientes
        $i=0;
        foreach ($params as $value) {
            foreach ($lista_persona['resultado'] as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $params[$i]['id'] = $persona['id'];
                    $params[$i]['apellido'] = $persona['apellido'];
                    $params[$i]['nombre'] = $persona['nombre'];
                    $params[$i]['nro_documento'] = $persona['nro_documento'];
                    $params[$i]['tipo_documentoid'] = $persona['tipo_documentoid'];
                    $params[$i]['fecha_nacimiento'] = $persona['fecha_nacimiento'];
                    $params[$i]['sexo'] = $persona['sexo'];
                    $params[$i]['nacionalidadid'] = $persona['nacionalidadid'];
                    $params[$i]['nacionalidad'] = ($persona['nacionalidadid']==PersonaForm::NACIONALIDAD_ARGENTINA)?'A':'E';
                    $params[$i]['cuil'] = $persona['cuil'];
                    $params[$i]['telefono'] = $persona['telefono'];
                    $params[$i]['celular'] = $persona['celular'];
                    $params[$i]['email'] = $persona['email'];
                    
                    if(!empty($persona['lugar'])){
                        $params[$i]['lugar']['calle'] = $persona['lugar']['calle'];
                        $params[$i]['lugar']['altura'] = $persona['lugar']['altura'];
                        $params[$i]['lugar']['localidad'] = $persona['lugar']['localidad'];
                        $params[$i]['lugar']['codigo_postal'] = $persona['lugar']['codigo_postal'];
                        $params[$i]['lugar']['barrio'] = $persona['lugar']['barrio'];
                        $params[$i]['lugar']['depto'] = $persona['lugar']['depto'];
                        $params[$i]['lugar']['piso'] = $persona['lugar']['piso'];
                        $params[$i]['lugar']['escalera'] = $persona['lugar']['escalera'];
                    }else{
                        unset($params[$i]['lugar']);
                    }
                    break;
                }
            }
            $i++;
        }

        return $params;
    }

    /**
     * Se exportan prestacion es una archivo llamado CTASLDO.TXT
     * @param array $params
     * @return string
     * @throws \yii\web\HttpException
     */
    public static function exportConvenio($params){
        $resultado = [];
        $errors = [];
        if(!isset($params['tipo_convenioid']) || empty($params['tipo_convenioid'])){
            throw new \yii\web\HttpException(400, 'Falta tipo de convenio');
        }
        $lista_prestacion = Prestacion::find()->where([
            'tipo_convenioid' => $params['tipo_convenioid'],
            'estado' => Prestacion::PREPARADO_A_EXPORTAR    
        ])->asArray()->all();
        

        /***** Armamos la instancia completa con Persona y Sub-Sucursal*****/
        $lista_persona_prestacion = self::setInstanciaSubSucursalYPersona($lista_prestacion);

        /***** Se validan y se registran las prestaciones *********/
        $i=0;
        foreach ($lista_persona_prestacion as $value) { 
            
            $model = Prestacion::findOne(['id'=>$value['prestacion']['id']]);
            $model->estado = Prestacion::SIN_CBU;
            $model->observacion = $value['prestacion']['observacion'];
            $model->scenario = $model::SCENARIO_EXPORT_CUENTA_SALDO;      
                        
            if(!$model->save()){
                // throw new \yii\web\HttpException(400, $model->scenario);
                $error = $model->errors;
                $error['persona'] = $value['nombre']." ".$value['apellido']." cuil:".$value['cuil'];
                $errors[] = $error;
            }

            $lista_persona_prestacion[$i]['prestacion']['id'] = $model->id;

            $i++;
        }
        //si hay errores notificamos
        if(!empty($errors)){
            throw new \yii\web\HttpException(400, json_encode($errors));
        }
        
        //Seteamos el txt a exportar
        $resultado = self::setCuentaSaldoTxt($lista_persona_prestacion);

        self::registrarExportacion($lista_persona_prestacion);
        
        return $resultado;
    }

     /**
     * Registramos la exportacion de convenios
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
     * Se arma CTASLDO.TXT para exportar la prestaciones registradas. Este archivo  es adquirido por el banco Patagonia para importarlo en su sistema
     * @param array $lista_prestacion
     * @return string
     */
    static function setCuentaSaldoTxt($lista_prestacion) {
        $ctasaldo = '';
        $error = [];
        foreach ($lista_prestacion as $value) {
            $error['persona'] = $value['nombre']." ".$value['apellido']." cuil:".$value['cuil'];

            /*********** Validamos CtaSldo ***********/
            if(!isset($value['lugar']) || empty($value['lugar'])){
                $error['direccion'] = 'Faltan los datos de direccion.';
            }
                        
            //si hay errores notificamos
            if(count($error)>1){
                throw new \yii\web\HttpException(400, json_encode(array($error)));
            }
            
            /************* Fin de validacion CtaSldo ***************/
            
            //Estructura de CTASLDO.TXT
            $convenio_apellido = Help::mbstrpad('8180'.strtoupper(\app\components\Help::quitar_tildes($value['apellido'])), 34);
            $nombre = Help::mbstrpad(strtoupper(substr(\app\components\Help::quitar_tildes($value['nombre']), 0, 16)), 16);
            $tipo_documento = Help::mbstrpad($value['tipo_documentoid'], 3, "0", STR_PAD_LEFT);
            $nro_documento = Help::mbstrpad($value['nro_documento'], 17, "0", STR_PAD_LEFT);
            $nacionalidad = Help::mbstrpad($value['nacionalidad'], 3, "0", STR_PAD_LEFT);
            $fecha_nacimiento = \DateTime::createFromFormat('Y-m-d', $value['fecha_nacimiento'])->format('dmY');
            $sexo = ($value['sexo']=='Masculino')?'M':'F';
            $estado_civil = 'S';
            $calle = Help::mbstrpad(strtoupper(substr(\app\components\Help::quitar_tildes($value['lugar']['calle']), 0, 19)), 19);

            #Seteamos la altura en CTASALDO
            $patron = "/^[[:digit:]]+$/";
            if (!preg_match($patron, $value['lugar']['altura'])){
                $altura = '00001'; #Valor por defecto
            }else{
                $altura = $value['lugar']['altura'];
            }
            $altura = Help::mbstrpad(Help::mbstrpad(substr($altura, 0, 5), 5,'0',STR_PAD_LEFT),9);


            $localidad = Help::mbstrpad(strtoupper($value['lugar']['localidad']), 30);
            //  (strtoupper($value['lugar']['localidad']), 30);
            $codigo_postal = Help::mbstrpad(Help::mbstrpad($value['lugar']['codigo_postal'].'16'.'2', 8, "0", STR_PAD_LEFT), 38); //codigopostal.provinciaid.tipocuenta
            $cuil = Help::mbstrpad('008'.$value['cuil'].Help::mbstrpad($value['prestacion']['monto'], 5, "0", STR_PAD_LEFT), 37); //tipoincripcion.cuil.saldo
            $sucursal = Help::mbstrpad(date('dmY',strtotime(date('Y-m-d').' -1 day')).$value['prestacion']['sucursal_codigo'], 23); //fecha.sucursal_codigo
            $sucursal_codigo_postal = Help::mbstrpad(Help::mbstrpad($value['prestacion']['codigo_postal'], 5, "0", STR_PAD_LEFT), 30).'000000000                       '; //sub_sucursal[codigo_postal]

            $linea_ctasaldo = $convenio_apellido.$nombre.$tipo_documento.$nro_documento.$nacionalidad.$fecha_nacimiento.$sexo.$estado_civil.$calle.$altura.$localidad.$codigo_postal.$cuil.$sucursal.$sucursal_codigo_postal;
            $ctasaldo .= (empty($ctasaldo))?$linea_ctasaldo:"\r\n".$linea_ctasaldo;
            
        }
        
        return $ctasaldo;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        return ArrayHelper::merge($labels, [
            "tipo_convenioid" => "Tipo convenio"
        ]);
    }

    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'sucursal'=> function($model){
                return $model->subSucursal;
            },
            'tipo_convenio'=> function($model){
                return $model->tipoConvenio->nombre;
            },
            'export_at'=> function($model){
                return (isset($model->exportid))?\DateTime::createFromFormat('Y-m-d H:i:s', $model->export->export_at)->format('Y-m-d'):"";
            }
        ]);
        
    }
}
