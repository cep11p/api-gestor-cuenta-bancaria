<?php

namespace app\models;


use yii\helpers\ArrayHelper;
use Yii;
use yii\console\Exception;
use app\models\Estudio;
use yii\base\Model;

/**
 * Esto es un modelo que representa un estudio en el Sistema Registral
 */
class EstudioForm extends Model
{
    public $nivel_educativoid;
    public $titulo;
    public $completo;
    public $en_curso;
    public $anio;
    public $personaid;

    public function rules()
    {
        return [
            [['nivel_educativoid'], 'required'],
            [['nivel_educativoid', 'completo', 'en_curso', 'personaid'], 'integer'],
            [['anio'], 'date', 'format' => 'php:Y'],
            [['titulo'], 'string', 'max' => 200],
        ];
    }
    
    public function setAttributes($values, $safeOnly = true) {
        parent::setAttributes($values, $safeOnly);
        
        if($values['en_curso']==true || $values['en_curso']==1){
            $this->en_curso = 1;
            $this->completo = 0;
        }else{
            $this->en_curso = 0;
            $this->completo = 1;
        }        
        
    }
}
