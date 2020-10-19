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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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


        return $coleccion;
    }
}