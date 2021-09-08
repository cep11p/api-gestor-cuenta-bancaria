<?php

use yii\db\Migration;

/**
 * Class m210908_123012_clasificacion_de_convenio
 */
class m210908_123012_clasificacion_de_convenio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        #Area
        $this->createTable('area', ['id' => $this->primaryKey(), 'nombre' => $this->string(100)]);

        #Tipo Convenio
        $this->createTable('tipo_convenio', ['id' => $this->primaryKey(), 'nombre' => $this->string(100)]);

        #creamos los nuevos atributos de instancia
        $this->addColumn('prestacion', 'areaid', $this->integer());
        $this->addColumn('prestacion', 'tipo_convenioid', $this->integer());

        #Creamos la integracion de area y convenio en Prestacion
        $this->addForeignKey('area_fk', 'prestacion', 'areaid', 'area', 'id');
        $this->addForeignKey('tipo_convenio_fk', 'prestacion', 'tipo_convenioid', 'tipo_convenio', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210908_123012_clasificacion_de_convenio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210908_123012_clasificacion_de_convenio cannot be reverted.\n";

        return false;
    }
    */
}
