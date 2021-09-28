<?php

use yii\db\Migration;

/**
 * Class m210928_141855_vincular_rule_a_cuenta_saldo_exportar
 */
class m210928_141855_vincular_rule_a_cuenta_saldo_exportar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('auth_item', ['rule_name' => 'convenio_rule'], ['name' => 'cuenta_saldo_exportar']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210928_141855_vincular_rule_a_cuenta_saldo_exportar cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210928_141855_vincular_rule_a_cuenta_saldo_exportar cannot be reverted.\n";

        return false;
    }
    */
}
