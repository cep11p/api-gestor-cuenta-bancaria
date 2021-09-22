<?php

use yii\db\Migration;

/**
 * Class m210922_140842_alter_column_tipo_convenioid
 */
class m210922_140842_alter_column_tipo_convenioid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('prestacion', 'tipo_convenioid', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210922_140842_alter_column_tipo_convenioid cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210922_140842_alter_column_tipo_convenioid cannot be reverted.\n";

        return false;
    }
    */
}
