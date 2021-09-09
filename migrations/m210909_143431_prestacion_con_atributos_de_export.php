<?php

use app\models\Export;
use yii\db\Migration;

/**
 * Class m210909_143431_prestacion_con_atributos_de_export
 */
class m210909_143431_prestacion_con_atributos_de_export extends Migration
{
    /**
     * Se migra integridad de exportacion a todas las prestaciones
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('prestacion', 'exportid', $this->integer());

        $lista_export = Export::find()->where(['tipo' => 'ctasaldo'])->asArray()->all();
        #obtenemos atributos para migrar las prestaciones
        foreach ($lista_export as $export) {
            $lista_prestacionid = explode(',',$export['lista_ids']);
            #id de la exportacion a vincular
            $id = $export['id'];

            #registramos los datos de un exportación en prestaciones
            $this->update('prestacion', ['exportid' => $id],['id' => $lista_prestacionid]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210909_143431_prestacion_con_atributos_de_export cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210909_143431_prestacion_con_atributos_de_export cannot be reverted.\n";

        return false;
    }
    */
}
