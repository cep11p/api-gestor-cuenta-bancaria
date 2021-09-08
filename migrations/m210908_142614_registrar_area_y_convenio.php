<?php

use yii\db\Migration;

/**
 * Class m210908_142614_registrar_area_y_convenio
 */
class m210908_142614_registrar_area_y_convenio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #registramos Areas
        $this->insert('area', ['id' => 1,'nombre' => 'Secretaria de Políticas Sociales y Articulación Territorial']);
        $this->insert('area', ['id' => 2,'nombre' => 'SubSecretaria de Integración Social']);

        #Registrar Convenios
        $this->insert('tipo_convenio', ['id' => 1,'nombre' => '8180']);
        $this->insert('tipo_convenio', ['id' => 2,'nombre' => '8277']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210908_142614_registrar_area_y_convenio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210908_142614_registrar_area_y_convenio cannot be reverted.\n";

        return false;
    }
    */
}
