<?php

use yii\db\Migration;

/**
 * Class m210609_160406_borrar_bancos_innecesarios
 */
class m210609_160406_borrar_bancos_innecesarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('banco', ['id'=>66]);
        $this->delete('banco', ['id'=>67]);
        $this->delete('banco', ['id'=>68]);
        $this->delete('banco', ['id'=>69]);
        $this->delete('banco', ['id'=>71]);
        $this->delete('banco', ['id'=>72]);
        $this->delete('banco', ['id'=>73]);
        $this->delete('banco', ['id'=>74]);
        $this->delete('banco', ['id'=>75]);
        $this->delete('banco', ['id'=>76]);
        $this->delete('banco', ['id'=>77]);
        $this->delete('banco', ['id'=>78]);
        $this->delete('banco', ['id'=>79]);
        $this->delete('banco', ['id'=>80]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210609_160406_borrar_bancos_innecesarios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210609_160406_borrar_bancos_innecesarios cannot be reverted.\n";

        return false;
    }
    */
}
