<?php

use app\models\Cuenta;
use app\models\Prestacion;
use yii\db\Migration;

/**
 * Class m211004_124649_migrar_cuenta_importadas_con_convenio_y_import_at
 */
class m211004_124649_migrar_cuenta_importadas_con_convenio_y_import_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('cuenta', 'create_at', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP()'));
        
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
        $lista_prestacion = Prestacion::find()->where(['estado' => Prestacion::CON_CBU])->asArray()->all();
        $lista_personaid = array();
        foreach ($lista_prestacion as $prestacion) {
            $lista_personaid[] = $prestacion['personaid'];
        }
        $lista_cuenta = Cuenta::find()->where(['personaid' => $lista_personaid])->asArray()->all();

        foreach ($lista_cuenta as $cuenta) {
            $this->update('cuenta', ['tipo_convenioid' => null, 'import_at' => null], ['id' => $cuenta['id']]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211004_124649_migrar_cuenta_importadas_con_convenio_y_import_at cannot be reverted.\n";

        return false;
    }
    */
}
