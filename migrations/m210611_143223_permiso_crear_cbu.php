<?php

use yii\db\Migration;

/**
 * Class m210611_143223_permiso_crear_cbu
 */
class m210611_143223_permiso_crear_cbu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', [
            'name' => 'cuenta_crear',
            'type' => 2,
            'description' => 'Permite crear un CBU'
        ]);

        $this->insert('auth_item', [
            'name' => 'cuenta_borrar',
            'type' => 2,
            'description' => 'Permite borrar un CBU'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210611_143223_permiso_crear_cbu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210611_143223_permiso_crear_cbu cannot be reverted.\n";

        return false;
    }
    */
}
