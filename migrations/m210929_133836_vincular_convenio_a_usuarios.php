<?php

use app\models\AuthAssignment;
use app\models\AuthItem;
use app\models\User;
use app\models\UserPersona;
use app\models\UsuarioHasConvenio;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m210929_133836_vincular_convenio_a_usuarios
 */
class m210929_133836_vincular_convenio_a_usuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $lista_usuario = UserPersona::find()->where(['!=','userid',1])->asArray()->all();
        foreach ($lista_usuario as $user) {
            $query = new Query();
            $lista_permiso = $query->select(['user_id','item_name'])->from('auth_assignment')->leftJoin('auth_item ai','item_name=ai.name')->where(['ai.type' => AuthItem::PERMISO, 'user_id' => $user['userid']])->createCommand()->queryAll();
            foreach ($lista_permiso as $permiso) {

                $this->insert('usuario_has_convenio', [
                    'userid' => $permiso['user_id'],
                    'tipo_convenioid' => 1,
                    'permiso' => $permiso['item_name'] 
                ]);
            }

        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210929_133836_vincular_convenio_a_usuarios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_133836_vincular_convenio_a_usuarios cannot be reverted.\n";

        return false;
    }
    */
}
