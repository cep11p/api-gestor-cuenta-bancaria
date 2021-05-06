<?php

use yii\db\Migration;

/**
 * Class m210506_133133_export
 */
class m210506_133133_export extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table='export';
        $this->createTable($table, [
            'id'=>$this->primaryKey(),
            'lista_ids'=>$this->string(),
            'tipo'=>$this->string(),
            'export_at'=>$this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210506_133133_export cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210506_133133_export cannot be reverted.\n";

        return false;
    }
    */
}
