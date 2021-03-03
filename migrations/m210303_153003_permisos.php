<?php

use yii\db\Migration;

/**
 * Class m210303_153003_permisos
 */
class m210303_153003_permisos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = 'auth_item';        
        $this->insert($tableName, ['name'=>'persona_crear','type'=>2,'description'=>'Permite registrar una persona','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'persona_modificar','type'=>2,'description'=>'Permite modificar datos de una persona','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'cuenta_ver','type'=>2,'description'=>'Permite visualizar cuenta/s','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'cuenta_saldo_crear','type'=>2,'description'=>'Permite guardar el documento cuenta saldo','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'cuenta_saldo_exportar','type'=>2,'description'=>'Permite exportar el documento cuenta saldo','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'cuenta_bps_importar','type'=>2,'description'=>'Permite importar el documento cuenta bps','created_at'=>time()]);
        $this->insert($tableName, ['name'=>'interbanking_exportar','type'=>2,'description'=>'Permite exportar el documento interbanking','created_at'=>time()]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210303_153003_permisos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210303_153003_permisos cannot be reverted.\n";

        return false;
    }
    */
}
