<?php

use yii\db\Migration;

/**
 * Class m210615_140130_vincular_permisos_cuenta_a_admin
 */
class m210615_140130_vincular_permisos_cuenta_a_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'auth_assignment';
        $this->insert($table, ['item_name' => 'cuenta_crear','user_id' => 1]);
        $this->insert($table, ['item_name' => 'cuenta_modificar','user_id' => 1]);
        $this->insert($table, ['item_name' => 'cuenta_borrar','user_id' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210615_140130_vincular_permisos_cuenta_a_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210615_140130_vincular_permisos_cuenta_a_admin cannot be reverted.\n";

        return false;
    }
    */
}
