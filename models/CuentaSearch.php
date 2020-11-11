<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuenta;

/**
* CuentaSearch represents the model behind the search form about `app\models\Cuenta`.
*/
class CuentaSearch extends Cuenta
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'personaid', 'bancoid', 'tipo_cuentaid'], 'integer'],
            [['cbu', 'create_at'], 'safe'],
        ];
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
    * Creates data provider instance with search query applied
    *
    * @param array $params
    *
    * @return ActiveDataProvider
    */
    public function search($params)
    {
        $query = Cuenta::find();
        $paginacion = [
            "pageSize"=>$pagesize = (!isset($params['pagesize']) || !is_numeric($params['pagesize']) || $params['pagesize']==0)?20:intval($params['pagesize']),
            "page"=>(isset($params['page']) && is_numeric($params['page']))?$params['page']:0
        ];
        $paginacion_max = [
            "pageSize"=>1000,
            "page"=>(isset($params['page']) && is_numeric($params['page']))?$params['page']:0
        ];

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => (!isset($params['pagesize']) && !isset($params['page']))?$paginacion_max:$paginacion
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
         ############ Buscamos por datos de persona ############
        #global search #global param
        $personaForm = new PersonaForm();
        if(isset($params['global_param']) && !empty($params['global_param'])){
            $persona_params["global_param"] = $params['global_param'];
        }
        
        if(isset($params['persona']['localidadid']) && !empty($params['persona']['localidadid'])){
            $persona_params['localidadid'] = $params['persona']['localidadid'];    
        }
        
        if(isset($params['persona']['direccion']) && !empty($params['persona']['direccion'])){
            $persona_params['direccion'] = $params['persona']['direccion'];    
        }
        
        $coleccion_persona = array();
        $lista_personaid = array();
        if (isset($persona_params)) {
            
            $coleccion_persona = $personaForm->buscarPersonaEnRegistral($persona_params);
            $lista_personaid = $this->obtenerListaIds($coleccion_persona);

            if (count($lista_personaid) < 1) {
                $query->where('0=1');
            }
        }
        
        #Criterio de recurso social por lista de persona.... lista de personaid
        if(count($lista_personaid)>0){
            $query->andWhere(array('in', 'personaid', $lista_personaid));
        }
        ############ Fin filtrado por Persona ############

        //Filtrado por coleccion de ids
        if(isset($params['ids']) && !empty($params['ids'])){
            $lista_id = explode(",", $params['ids']);
            $query->andWhere(array('in', 'id', $lista_id));
        
        }else if(isset($params['persona_ids']) && !empty($params['persona_ids'])){
            $lista_id = explode(",", $params['persona_ids']);
            $query->andWhere(array('in', 'personaid', $lista_id));
        }else{
            $query->andFilterWhere([
                'id' => $this->id,
                'personaid' => $this->personaid,
                'bancoid' => $this->bancoid,
                'tipo_cuentaid' => $this->tipo_cuentaid,
                'create_at' => $this->create_at,
            ]);

            $query->andFilterWhere(['like', 'cbu', $this->cbu]);
        }

        /******* Se obtiene la coleccion******/
        $coleccion = array();
        foreach ($dataProvider->getModels() as $value) {
            $coleccion[] = $value->toArray();
        }
        
        $coleccion = Cuenta::vincularPropietario($coleccion);
        
        $paginas = ceil($dataProvider->totalCount/$pagesize);           
        $resultado['pagesize']=$pagesize;            
        $resultado['pages']=$paginas;            
        $resultado['total_filtrado']=$dataProvider->totalCount;
        $resultado['resultado']=$coleccion;

        return $resultado;
    }
    
    /**
     * De una coleccion de persona, se obtienen una lista de ids
     * @param array $coleccion lista de personas
     * @return array
     */
    private function obtenerListaIds($coleccion = array()) {
        
        $lista_ids = array();
        foreach ($coleccion as $col) {
            $lista_ids[] = $col['id'];
        }
        
        return $lista_ids;    
    }
}