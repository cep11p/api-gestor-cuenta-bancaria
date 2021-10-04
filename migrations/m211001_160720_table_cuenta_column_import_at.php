<?php

use yii\db\Migration;

/**
 * Class m211001_160720_table_cuenta_column_import_at
 */
class m211001_160720_table_cuenta_column_import_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cuenta', 'import_at', $this->timestamp()->null());
        $this->addColumn('cuenta', 'tipo_convenioid', $this->integer()->null());

        //seteamos la integridad con el tipo_convenio
        $this->addForeignKey('fk_tipo_convenio', 'cuenta', 'tipo_convenioid', 'tipo_convenio', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211001_160720_table_cuenta_column_import_at cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211001_160720_table_cuenta_column_import_at cannot be reverted.\n";

        return false;
    }
    */
}
