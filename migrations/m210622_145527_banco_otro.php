<?php

use yii\db\Migration;

/**
 * Class m210622_145527_banco_otro
 */
class m210622_145527_banco_otro extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'banco';
        $this->insert($table, ['id' => 999, 'nombre' => '...Otro']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210622_145527_banco_otro cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210622_145527_banco_otro cannot be reverted.\n";

        return false;
    }
    */
}
