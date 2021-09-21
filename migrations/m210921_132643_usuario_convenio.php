<?php

use yii\db\Migration;

/**
 * Class m210921_132643_usuario_convenio
 */
class m210921_132643_usuario_convenio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuario_has_convenio', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer(),
            'tipo_convenioid' => $this->integer(),
            'permiso' => $this->string(100),
            'create_at' => $this->timestamp()
        ]);

        #realizamos la integridad

        #Con Usuario
        $this->addForeignKey('usuario_fk', 'usuario_has_convenio', 'userid', 'user', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210921_132643_usuario_convenio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210921_132643_usuario_convenio cannot be reverted.\n";

        return false;
    }
    */
}
