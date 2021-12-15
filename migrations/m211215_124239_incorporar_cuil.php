<?php

use app\models\Prestacion;
use yii\db\Migration;

/**
 * Class m211215_124239_incorporar_cuil
 */
class m211215_124239_incorporar_cuil extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #agregamos la columna cuil en prestacion
        $this->addColumn('prestacion', 'cuil', $this->string(15));

        #Vamos a incorporar el cuil en prestacion
        $lista_personaid = Prestacion::find()->select('personaid as id')->asArray()->all();

        $persona_list = \Yii::$app->registral->filtrarPersonaPorIds(['lista_ids' => $lista_personaid]);

        foreach ($persona_list as $p) {
            $this->update('prestacion', ['cuil'=>$p['cuil']], ['personaid' => $p['id']]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211215_124239_incorporar_cuil cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211215_124239_incorporar_cuil cannot be reverted.\n";

        return false;
    }
    */
}
