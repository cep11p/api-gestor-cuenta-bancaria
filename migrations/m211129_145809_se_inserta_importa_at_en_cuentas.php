<?php

use app\models\Prestacion;
use app\models\Cuenta;
use yii\db\Migration;

/**
 * Class m211129_145809_se_inserta_importa_at_en_cuentas
 */
class m211129_145809_se_inserta_importa_at_en_cuentas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $lista_prestacion = Prestacion::find()->where(['estado' => Prestacion::CON_CBU])->asArray()->all();
        $lista_personaid = array();
        foreach ($lista_prestacion as $prestacion) {
            $lista_personaid[] = $prestacion['personaid'];
        }
        $lista_cuenta = Cuenta::find()->where(['personaid' => $lista_personaid])->asArray()->all();

        foreach ($lista_cuenta as $cuenta) {
            $this->update('cuenta', ['tipo_convenioid' => 1, 'import_at' => $cuenta['create_at']], ['id' => $cuenta['id']]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211129_145809_se_inserta_importa_at_en_cuentas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211129_145809_se_inserta_importa_at_en_cuentas cannot be reverted.\n";

        return false;
    }
    */
}
