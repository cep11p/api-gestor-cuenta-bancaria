<?php

use yii\db\Migration;

/**
 * Class m210909_165026_prestacion_export_fk
 */
class m210909_165026_prestacion_export_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_exportid', 'prestacion', 'exportid', 'export', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210909_165026_prestacion_export_fk cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210909_165026_prestacion_export_fk cannot be reverted.\n";

        return false;
    }
    */
}
