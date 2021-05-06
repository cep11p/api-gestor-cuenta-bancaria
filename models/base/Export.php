<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "export".
 *
 * @property integer $id
 * @property string $lista_ids
 * @property string $tipo
 * @property string $export_at
 * @property string $aliasModel
 */
abstract class Export extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'export';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['export_at'], 'safe'],
            [['lista_ids', 'tipo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lista_ids' => 'Lista Ids',
            'tipo' => 'Tipo',
            'export_at' => 'Export At',
        ];
    }




}
