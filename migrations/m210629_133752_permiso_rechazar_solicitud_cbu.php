<?php

use yii\db\Migration;

/**
 * Class m210629_133752_permiso_rechazar_solicitud_cbu
 */
class m210629_133752_permiso_rechazar_solicitud_cbu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'auth_item';
        $this->insert($table, ['name' => 'prestacion_borrar','type' => 2, 'description' => 'Permino rechazar la solicitud de CBU (Reinicia el ciclo de la peticion)']);

        $this->insert('auth_assignment', ['item_name' => 'prestacion_borrar', 'user_id' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210629_133752_permiso_rechazar_solicitud_cbu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210629_133752_permiso_rechazar_solicitud_cbu cannot be reverted.\n";

        return false;
    }
    */
}
