<?php

use yii\db\Migration;

/**
 * Class m210223_141226_roles
 */
class m210223_141226_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = 'auth_item';        
        $this->insert($tableName, ['name'=>'admin','type'=>1,'description'=>'Encargado de gestionar todo el sistema','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'soporte','type'=>1,'description'=>'Encargado de gestionar los usuarios y permisos de los mismos','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'usuario','type'=>1,'description'=>'Encargado de usar la aplicacion como herramienta','created_at'=>time()]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210223_141226_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210223_141226_roles cannot be reverted.\n";

        return false;
    }
    */
}
