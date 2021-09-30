<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "usuario_has_convenio".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $tipo_convenioid
 * @property string $permiso
 * @property string $create_at
 *
 * @property \app\models\User $user
 * @property string $aliasModel
 */
abstract class UsuarioHasConvenio extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_has_convenio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'tipo_convenioid'], 'integer'],
            [['create_at'], 'safe'],
            [['permiso'], 'string', 'max' => 100],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['userid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'tipo_convenioid' => 'Tipo Convenioid',
            'permiso' => 'Permiso',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'userid']);
    }




}