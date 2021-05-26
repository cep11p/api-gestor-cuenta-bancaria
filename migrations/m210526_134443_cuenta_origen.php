<?php

use yii\db\Migration;

/**
 * Class m210526_134443_cuenta_origen
 */
class m210526_134443_cuenta_origen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cuenta', 'sub_sucursalid', $this->integer());
        $this->addForeignKey('fk_cuenta_sub_sucursalid', 'cuenta', 'sub_sucursalid', 'sub_sucursal', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210526_134443_cuenta_origen cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210526_134443_cuenta_origen cannot be reverted.\n";

        return false;
    }
    */
}
