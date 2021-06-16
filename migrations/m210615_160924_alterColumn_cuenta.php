<?php

use yii\db\Migration;

/**
 * Class m210615_160924_alterColumn_cuenta
 */
class m210615_160924_alterColumn_cuenta extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('cuenta', 'create_at', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210615_160924_alterColumn_cuenta cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210615_160924_alterColumn_cuenta cannot be reverted.\n";

        return false;
    }
    */
}
