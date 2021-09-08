<?php

use yii\db\Migration;

/**
 * Class m210908_152602_tipo_exportacion
 */
class m210908_152602_tipo_exportacion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #creamos la tabla tipo export
        $this->createTable('tipo_export', ['id' => $this->primaryKey(), 'nombre' => $this->string()]);

        #registramos los tipos
        $this->insert('tipo_export', [
            'id' => 1,
            'nombre' => 'Convenio 8180'
        ]);

        $this->insert('tipo_export', [
            'id' => 2,
            'nombre' => 'Convenio 8277'
        ]);

        $this->insert('tipo_export', [
            'id' => 3,
            'nombre' => 'Safyc'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210908_152602_tipo_exportacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210908_152602_tipo_exportacion cannot be reverted.\n";

        return false;
    }
    */
}
