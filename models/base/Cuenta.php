<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "cuenta".
 *
 * @property integer $id
 * @property string $cbu
 * @property integer $personaid
 * @property integer $bancoid
 * @property integer $tipo_cuentaid
 * @property string $create_at
 * @property integer $tesoreria_alta
 * @property integer $sub_sucursalid
 * @property string $import_at
 * @property integer $tipo_convenioid
 *
 * @property \app\models\Banco $banco
 * @property \app\models\SubSucursal $subSucursal
 * @property \app\models\TipoCuenta $tipoCuenta
 * @property \app\models\TipoConvenio $tipoConvenio
 * @property string $aliasModel
 */
abstract class Cuenta extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cbu', 'personaid', 'bancoid', 'tipo_cuentaid'], 'required'],
            [['personaid', 'bancoid', 'tipo_cuentaid', 'tesoreria_alta', 'sub_sucursalid', 'tipo_convenioid'], 'integer'],
            [['create_at', 'import_at'], 'safe'],
            [['cbu'], 'string', 'max' => 45],
            [['cbu'], 'unique'],
            [['bancoid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Banco::className(), 'targetAttribute' => ['bancoid' => 'id']],
            [['sub_sucursalid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\SubSucursal::className(), 'targetAttribute' => ['sub_sucursalid' => 'id']],
            [['tipo_cuentaid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\TipoCuenta::className(), 'targetAttribute' => ['tipo_cuentaid' => 'id']],
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
            'cbu' => 'Cbu',
            'personaid' => 'Personaid',
            'bancoid' => 'Bancoid',
            'tipo_cuentaid' => 'Tipo Cuentaid',
            'create_at' => 'Create At',
            'tesoreria_alta' => 'Tesoreria Alta',
            'sub_sucursalid' => 'Sub Sucursalid',
            'import_at' => 'Import At',
            'tipo_convenioid' => 'Tipo Convenioid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanco()
    {
        return $this->hasOne(\app\models\Banco::className(), ['id' => 'bancoid']);
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
    public function getTipoCuenta()
    {
        return $this->hasOne(\app\models\TipoCuenta::className(), ['id' => 'tipo_cuentaid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoConvenio()
    {
        return $this->hasOne(\app\models\TipoConvenio::className(), ['id' => 'tipo_convenioid']);
    }




}
