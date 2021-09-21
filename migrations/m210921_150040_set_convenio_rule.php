<?php

use yii\db\Migration;

/**
 * Class m210921_150040_set_convenio_rule
 */
class m210921_150040_set_convenio_rule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('auth_item', ['rule_name' => 'convenio_rule'], ['name' => 'cuenta_saldo_crear']);
        $this->update('auth_item', ['rule_name' => 'convenio_rule'], ['name' => 'prestacion_borrar']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210921_150040_set_convenio_rule cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210921_150040_set_convenio_rule cannot be reverted.\n";

        return false;
    }
    */
}
