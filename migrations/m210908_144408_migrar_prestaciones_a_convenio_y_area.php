<?php

use yii\db\Migration;

/**
 * Class m210908_144408_migrar_prestaciones_a_convenio_y_area
 */
class m210908_144408_migrar_prestaciones_a_convenio_y_area extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #migramos todas las prestaciones a un convenio y a un area
        $this->update('prestacion', ['tipo_convenioid' => 1, 'areaid' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210908_144408_migrar_prestaciones_a_convenio_y_area cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210908_144408_migrar_prestaciones_a_convenio_y_area cannot be reverted.\n";

        return false;
    }
    */
}
