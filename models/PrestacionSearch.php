<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestacion;

/**
* PrestacionSearch represents the model behind the search form about `app\models\Prestacion`.
*/
class PrestacionSearch extends Prestacion
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'sub_sucursalid', 'personaid', 'estado'], 'integer'],
            [['monto'], 'number'],
            [['create_at', 'proposito', 'observacion', 'fecha_ingreso'], 'safe'],
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
        $query = Prestacion::find();

        $paginacion = [
            "pageSize"=>$pagesize = (!isset($params['pagesize']) || !is_numeric($params['pagesize']) || $params['pagesize']==0)?500:intval($params['pagesize']),
            "page"=>(isset($params['page']) && is_numeric($params['page']))?$params['page']:0
        ];
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $paginacion
        ]);


        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

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
                'monto' => $this->monto,
                'create_at' => $this->create_at,
                'sub_sucursalid' => $this->sub_sucursalid,
                'personaid' => $this->personaid,
                'estado' => $this->estado,
                'fecha_ingreso' => $this->fecha_ingreso,
            ]);
            $query->andFilterWhere(['like', 'proposito', $this->proposito])
                ->andFilterWhere(['like', 'observacion', $this->observacion]);
        }

        /******* Se obtiene la coleccion******/
        $coleccion = array();
        foreach ($dataProvider->getModels() as $value) {
            $coleccion[] = $value->toArray();
        }
        
        
        $paginas = ceil($dataProvider->totalCount/$pagesize);           
        $resultado['pagesize']=$pagesize;            
        $resultado['pages']=$paginas;            
        $resultado['total_filtrado']=$dataProvider->totalCount;
        $resultado['resultado']=$coleccion;

        return $resultado;
    }
}