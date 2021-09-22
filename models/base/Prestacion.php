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
 * @property integer $tipo_convenioid
 * @property integer $exportid
 *
 * @property \app\models\Export $export
 * @property \app\models\SubSucursal $subSucursal
 * @property \app\models\TipoConvenio $tipoConvenio
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
            [['sub_sucursalid', 'personaid', 'estado', 'tipo_convenioid', 'exportid'], 'integer'],
            [['exportid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Export::className(), 'targetAttribute' => ['exportid' => 'id']],
            [['sub_sucursalid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\SubSucursal::className(), 'targetAttribute' => ['sub_sucursalid' => 'id']],
            [['tipo_convenioid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\TipoConvenio::className(), 'targetAttribute' => ['tipo_convenioid' => 'id']]
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
            'tipo_convenioid' => 'Tipo Convenioid',
            'exportid' => 'Exportid',
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
    public function getExport()
    {
        return $this->hasOne(\app\models\Export::className(), ['id' => 'exportid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSucursal()
    {
        return $this->hasOne(\app\models\SubSucursal::className(), ['id' => 'sub_sucursalid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoConvenio()
    {
        return $this->hasOne(\app\models\TipoConvenio::className(), ['id' => 'tipo_convenioid']);
    }




}
