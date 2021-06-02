<?php

use yii\db\Migration;

/**
 * Class m210602_151255_borrar_permisos
 */
class m210602_151255_borrar_permisos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('auth_item', ['name'=>'cuenta_ver']);
        $this->delete('auth_item', ['name'=>'persona_ver']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210602_151255_borrar_permisos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210602_151255_borrar_permisos cannot be reverted.\n";

        return false;
    }
    */
}
