<?php

use yii\db\Migration;

/**
 * Class m210319_125047_parent_permiso
 */
class m210319_125047_parent_permiso extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #Nuevo Permiso
        $this->insert('auth_item', [
                'name'=>'persona_ver',
                'type'=>2,
                'description'=>'Se permite visualizar personas',
            ]
        );

        $tableName = 'auth_item_child';
        $this->insert($tableName, ['parent'=>'persona_crear','child'=>'persona_ver']);
        $this->insert($tableName, ['parent'=>'cuenta_ver','child'=>'persona_ver']);
        $this->insert($tableName, ['parent'=>'cuenta_saldo_crear','child'=>'persona_crear']);
        $this->insert($tableName, ['parent'=>'cuenta_saldo_exportar','child'=>'persona_ver']);
        $this->insert($tableName, ['parent'=>'cuenta_bps_importar','child'=>'persona_ver']);
        $this->insert($tableName, ['parent'=>'interbanking_exportar','child'=>'persona_ver']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210319_125047_parent_permiso cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210319_125047_parent_permiso cannot be reverted.\n";

        return false;
    }
    */
}
