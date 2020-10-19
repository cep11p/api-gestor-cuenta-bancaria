<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubSucursal;

/**
* SubSucursalSearch represents the model behind the search form about `app\models\SubSucursal`.
*/
class SubSucursalSearch extends SubSucursal
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'sucursalid'], 'integer'],
            [['localidad', 'codigo_postal', 'codigo'], 'safe'],
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
        $query = SubSucursal::find();

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
        
        }else{
            $query->andFilterWhere([
                'id' => $this->id,
                'sucursalid' => $this->sucursalid,
            ]);

            $query->andFilterWhere(['like', 'localidad', $this->localidad])
                ->andFilterWhere(['like', 'codigo_postal', $this->codigo_postal])
                ->andFilterWhere(['like', 'codigo', $this->codigo]);
        }
        
        /******* Se obtiene la coleccion******/
        $coleccion = array();
        foreach ($dataProvider->getModels() as $value) {
            $coleccion[] = $value->toArray();
        }


        return $coleccion;
    }
    
    /**
     * crear un string con los criterio de busquedad por ejemplo: localidadid=1&calle=mata negra&altura=123
     * @param array $param
     * @return string
     */
    public function crearCriterioBusquedad($param){
        $criterio = '';
        $primeraVez = true;
        foreach ($param as $key => $value) {
            if($primeraVez){
                $criterio.=$key.'='.$value;
                $primeraVez = false;
            }else{
                $criterio.='&'.$key.'='.$value;
            }            
        }
        
        return $criterio;
    }
}