<?php

namespace app\models;

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
        
        //chequeamos si la persona tiene cuenta con cbu para definir el estado de la prestacion
        $cuenta = Cuenta::findOne(['personaid'=> $this->personaid]);
        if(isset($cuenta)){
            $this->estado = $this::CON_CBU;
        }else{
            $this->estado = $this::SIN_CBU;
        }
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

    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'sucursal'=> function($model){
                return $model->subSucursal;
            },
            'export_at'=> function($model){
                return (isset($model->exportid))?\DateTime::createFromFormat('Y-m-d H:i:s', $model->export->export_at)->format('Y-m-d'):"";
            }
        ]);
        
    }
}
