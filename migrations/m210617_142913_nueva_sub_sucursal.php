<?php

use yii\db\Migration;

/**
 * Class m210617_142913_nueva_sub_sucursal
 */
class m210617_142913_nueva_sub_sucursal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'sub_sucursal';
        $this->insert($table, [
            'localidad' => 'Río Colorado',
            'codigo_postal' => '8138',
            'codigo' => '161389',
            'sucursalid' => 12
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210617_142913_nueva_sub_sucursal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210617_142913_nueva_sub_sucursal cannot be reverted.\n";

        return false;
    }
    */
}
