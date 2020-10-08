<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "prestacion".
 *
 * @property integer $id
 * @property double $monto
 * @property string $create_at
 * @property string $proposito
 * @property string $observacion
 * @property integer $sub_sucursalid
 * @property integer $personaid
 * @property integer $estado
 * @property string $fecha_ingreso
 *
 * @property \app\models\SubSucursal $subSucursal
 * @property string $aliasModel
 */
abstract class Prestacion extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto', 'create_at', 'sub_sucursalid', 'personaid', 'fecha_ingreso'], 'required'],
            [['monto'], 'number'],
            [['create_at', 'fecha_ingreso'], 'safe'],
            [['proposito', 'observacion'], 'string'],
            [['sub_sucursalid', 'personaid', 'estado'], 'integer'],
            [['sub_sucursalid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\SubSucursal::className(), 'targetAttribute' => ['sub_sucursalid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monto' => 'Monto',
            'create_at' => 'Create At',
            'proposito' => 'Proposito',
            'observacion' => 'Observacion',
            'sub_sucursalid' => 'Sub Sucursalid',
            'personaid' => 'Personaid',
            'estado' => 'Estado',
            'fecha_ingreso' => 'Fecha Ingreso',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'estado' => '0 - Sin CBU
1 - Con CBU
2 - En tesoreria',
            'fecha_ingreso' => 'Esta fecha nos indica cuando fue la solicitud de esta prestacion
',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSucursal()
    {
        return $this->hasOne(\app\models\SubSucursal::className(), ['id' => 'sub_sucursalid']);
    }




}
