<?php

use yii\db\Migration;

/**
 * Class m210701_141202_localidad_permiso
 */
class m210701_141202_localidad_permiso extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #Creamos los permisos
        $this->insert('auth_item', ['name' => 'localidad_crear', 'type' => 2, 'description' => 'Crea localidades']);
        $this->insert('auth_item', ['name' => 'localidad_modificar', 'type' => 2, 'description' => 'Modifica localidades']);

        #le asignamos permisos al admin
        $this->insert('auth_assignment', ['item_name' => 'localidad_crear', 'user_id' => 1]);
        $this->insert('auth_assignment', ['item_name' => 'localidad_modificar', 'user_id' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210701_141202_localidad_permiso cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210701_141202_localidad_permiso cannot be reverted.\n";

        return false;
    }
    */
}
