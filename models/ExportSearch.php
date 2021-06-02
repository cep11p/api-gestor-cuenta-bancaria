<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Export;

/**
* exportSearch represents the model behind the search form about `app\models\Export`.
*/
class ExportSearch extends Export
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['lista_ids', 'tipo', 'export_at'], 'safe'],
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
        $query = Export::find();

        $paginacion = [
            "pageSize"=>$pagesize = (!isset($params['pagesize']) || !is_numeric($params['pagesize']) || $params['pagesize']==0)?10:intval($params['pagesize']),
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

        $query->andFilterWhere([
            'id' => $this->id,
            'export_at' => $this->export_at,
        ]);

        $query->andFilterWhere(['like', 'lista_ids', $this->lista_ids])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        #### Filtro por rango de fecha ####
        $time_desde = ' 00:00:01';
        $time_hasta = ' 23:59:59';
        if(isset($params['export_at_desde']) && isset($params['export_at_hasta'])){
            $params['export_at_desde'] .= $time_desde;
            $params['export_at_hasta'] .= $time_hasta;
            $query->andWhere(['between', 'export_at', $params['export_at_desde'], $params['export_at_hasta']]);
        }else if(isset($params['export_at_desde'])){
            $params['export_at_desde'] .= $time_desde;
            $query->andWhere(['between', 'export_at', $params['export_at_desde'], date('Y-m-d')]);
        }else if(isset($params['export_at_hasta'])){
            $params['export_at_hasta'] .= $time_hasta;
            $query->andWhere(['between', 'export_at', '1970-01-01', $params['export_at_hasta']]);
        }else if(!isset($params['export_at_desde']) && !isset($params['export_at_hasta'])){
            
            $params['export_at_hasta'] = date('Y-m-d');
            $params['export_at_desde'] = date('Y-m-d',strtotime($params['export_at_hasta'].' -1 year'));

            $params['export_at_desde'] .= $time_desde;
            $params['export_at_hasta'] .= $time_hasta;

            $query->andWhere(['between', 'export_at', $params['export_at_desde'], $params['export_at_hasta']]);
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