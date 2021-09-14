<?php

use yii\db\Migration;

/**
 * Class m210914_125401_desincorporar_area
 */
class m210914_125401_desincorporar_area extends Migration
{
    /**
     * Vamos a sacar todo lo que es area, porque se define otra resolucion sin Area
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #Desvinculamos area en prestacion
        $this->dropForeignKey('area_fk','prestacion');
        $this->dropColumn('prestacion', 'areaid');
        #borramos la tabla area
        $this->dropTable('area');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210914_125401_desincorporar_area cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210914_125401_desincorporar_area cannot be reverted.\n";

        return false;
    }
    */
}
