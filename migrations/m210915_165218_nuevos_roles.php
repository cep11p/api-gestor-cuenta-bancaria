<?php

use yii\db\Migration;

/**
 * Class m210915_165218_nuevos_roles
 */
class m210915_165218_nuevos_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', ['name' => 'usuario_8180', 'type' => 1,'rule_name' => 'convenio8180_rule', 'description' => 'Este rol permite accionar sobre los convenio 8180']);
        $this->insert('auth_item', ['name' => 'usuario_8277', 'type' => 1,'rule_name' => 'convenio8277_rule', 'description' => 'Este rol permite accionar sobre los convenio 8277']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210915_165218_nuevos_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210915_165218_nuevos_roles cannot be reverted.\n";

        return false;
    }
    */
}
