<?php

use yii\db\Migration;

/**
 * Class m210928_144714_vincular_convenio_y_permisos_al_admin
 */
class m210928_144714_vincular_convenio_y_permisos_al_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Convenio 8180
        $this->insert('usuario_has_convenio', [
            "userid" => 1,
            "tipo_convenioid" => 1,
            "permiso" => "cuenta_saldo_crear"
        ]);
        $this->insert('usuario_has_convenio', [
            "userid" => 1,
            "tipo_convenioid" => 1,
            "permiso" => "cuenta_saldo_exportar"
        ]);
        $this->insert('usuario_has_convenio', [
            "userid" => 1,
            "tipo_convenioid" => 1,
            "permiso" => "prestacion_borrar"
        ]);

        //Convenio 8277
        $this->insert('usuario_has_convenio', [
            "userid" => 1,
            "tipo_convenioid" => 2,
            "permiso" => "cuenta_saldo_crear"
        ]);
        $this->insert('usuario_has_convenio', [
            "userid" => 1,
            "tipo_convenioid" => 2,
            "permiso" => "cuenta_saldo_exportar"
        ]);
        $this->insert('usuario_has_convenio', [
            "userid" => 1,
            "tipo_convenioid" => 2,
            "permiso" => "prestacion_borrar"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210928_144714_vincular_convenio_y_permisos_al_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210928_144714_vincular_convenio_y_permisos_al_admin cannot be reverted.\n";

        return false;
    }
    */
}
