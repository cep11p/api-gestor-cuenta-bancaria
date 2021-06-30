<?php

use yii\db\Migration;

/**
 * Class m210630_134247_subsucursal_san_antonio
 */
class m210630_134247_subsucursal_san_antonio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'sub_sucursal';
        $this->insert($table, [
            'localidad' => 'San Antonio Oeste',
            'codigo_postal' => '8520',
            'codigo' => '161398',
            'sucursalid' => 9
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210630_134247_subsucursal_san_antonio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210630_134247_subsucursal_san_antonio cannot be reverted.\n";

        return false;
    }
    */
}
