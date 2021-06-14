<?php

use yii\db\Migration;

/**
 * Class m210614_132119_permiso_crear_borrar_cuenta
 */
class m210614_132119_permiso_crear_borrar_cuenta extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'auth_item';
        $this->insert($table,['name'=>'cuenta_modificar','type'=>2,'description'=>'Permite solo modificar una cuenta']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210614_132119_permiso_crear_borrar_cuenta cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210614_132119_permiso_crear_borrar_cuenta cannot be reverted.\n";

        return false;
    }
    */
}
