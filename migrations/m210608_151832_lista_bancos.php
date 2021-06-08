<?php

use app\models\Banco;
use yii\db\Migration;

/**
 * Class m210608_151832_lista_bancos
 */
class m210608_151832_lista_bancos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        # Ponemos el id con AUTO_INCREMENT
        $this->dropForeignKey('fk_cuenta_banco', 'cuenta');
        $this->dropIndex('PRIMARY', 'banco');
        $this->alterColumn('banco', 'id', $this->primaryKey());
        $this->addForeignKey('fk_cuenta_banco','cuenta', 'bancoid','banco','id');

        $this->insert('banco', ['nombre'=>'BANCO DE GALICIA Y BUENOS AIRES S.A.U.']);
        $this->insert('banco', ['nombre'=>'BANCO DE LA NACION ARGENTINA']);
        $this->insert('banco', ['nombre'=>'BANCO DE LA PROVINCIA DE BUENOS AIRES']);
        $this->insert('banco', ['nombre'=>'INDUSTRIAL AND COMMERCIAL BANK OF CHINA']);
        $this->insert('banco', ['nombre'=>'CITIBANK N.A.']);
        $this->insert('banco', ['nombre'=>'BANCO BBVA ARGENTINA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE LA PROVINCIA DE CORDOBA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO SUPERVIELLE S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE LA CIUDAD DE BUENOS AIRES']);
        $this->insert('banco', ['nombre'=>'BANCO HIPOTECARIO S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE SAN JUAN S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO MUNICIPAL DE ROSARIO']);
        $this->insert('banco', ['nombre'=>'BANCO SANTANDER RIO S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DEL CHUBUT S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE SANTA CRUZ S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE LA PAMPA SOCIEDAD DE ECONOMÍA M']);
        $this->insert('banco', ['nombre'=>'BANCO DE CORRIENTES S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO PROVINCIA DEL NEUQUÉN SOCIEDAD ANÓ']);
        $this->insert('banco', ['nombre'=>'BRUBANK S.A.U.']);
        $this->insert('banco', ['nombre'=>'BANCO INTERFINANZAS S.A.']);
        $this->insert('banco', ['nombre'=>'HSBC BANK ARGENTINA S.A.']);
        $this->insert('banco', ['nombre'=>'OPEN BANK ARGENTINA S.A.']);
        $this->insert('banco', ['nombre'=>'JPMORGAN CHASE BANK, NATIONAL ASSOCIATIO']);
        $this->insert('banco', ['nombre'=>'BANCO CREDICOOP COOPERATIVO LIMITADO']);
        $this->insert('banco', ['nombre'=>'BANCO DE VALORES S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO ROELA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO MARIVA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO ITAU ARGENTINA S.A.']);
        $this->insert('banco', ['nombre'=>'BANK OF AMERICA, NATIONAL ASSOCIATION']);
        $this->insert('banco', ['nombre'=>'BNP PARIBAS']);
        $this->insert('banco', ['nombre'=>'BANCO PROVINCIA DE TIERRA DEL FUEGO']);
        $this->insert('banco', ['nombre'=>'BANCO DE LA REPUBLICA ORIENTAL DEL URUGU']);
        $this->insert('banco', ['nombre'=>'BANCO SAENZ S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO MERIDIAN S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO MACRO S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO COMAFI SOCIEDAD ANONIMA']);
        $this->insert('banco', ['nombre'=>'BANCO DE INVERSION Y COMERCIO EXTERIOR S']);
        $this->insert('banco', ['nombre'=>'BANCO PIANO S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO JULIO SOCIEDAD ANONIMA']);
        $this->insert('banco', ['nombre'=>'BANCO RIOJA SOCIEDAD ANONIMA UNIPERSONAL']);
        $this->insert('banco', ['nombre'=>'BANCO DEL SOL S.A.']);
        $this->insert('banco', ['nombre'=>'NUEVO BANCO DEL CHACO S. A.']);
        $this->insert('banco', ['nombre'=>'BANCO VOII S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE FORMOSA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO CMF S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE SANTIAGO DEL ESTERO S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO INDUSTRIAL S.A.']);
        $this->insert('banco', ['nombre'=>'NUEVO BANCO DE SANTA FE SOCIEDAD ANONIMA']);
        $this->insert('banco', ['nombre'=>'BANCO CETELEM ARGENTINA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE SERVICIOS FINANCIEROS S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO BRADESCO ARGENTINA S.A.U.']);
        $this->insert('banco', ['nombre'=>'BANCO DE SERVICIOS Y TRANSACCIONES S.A.']);
        $this->insert('banco', ['nombre'=>'RCI BANQUE S.A.']);
        $this->insert('banco', ['nombre'=>'BACS BANCO DE CREDITO Y SECURITIZACION S']);
        $this->insert('banco', ['nombre'=>'BANCO MASVENTAS S.A.']);
        $this->insert('banco', ['nombre'=>'WILOBANK S.A.']);
        $this->insert('banco', ['nombre'=>'NUEVO BANCO DE ENTRE RÍOS S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO COLUMBIA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO BICA S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO COINAG S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO DE COMERCIO S.A.']);
        $this->insert('banco', ['nombre'=>'BANCO SUCREDITO REGIONAL S.A.U.']);
        $this->insert('banco', ['nombre'=>'BANCO DINO S.A.']);
        $this->insert('banco', ['nombre'=>'BANK OF CHINA LIMITED SUCURSAL BUENOS AI']);
        $this->insert('banco', ['nombre'=>'FORD CREDIT COMPAÑIA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'COMPAÑIA FINANCIERA ARGENTINA S.A.']);
        $this->insert('banco', ['nombre'=>'VOLKSWAGEN FINANCIAL SERVICES COMPAÑIA F']);
        $this->insert('banco', ['nombre'=>'CORDIAL COMPAÑÍA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'FCA COMPAÑIA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'GPAT COMPAÑIA FINANCIERA S.A.U.']);
        $this->insert('banco', ['nombre'=>'MERCEDES-BENZ COMPAÑÍA FINANCIERA ARGENT']);
        $this->insert('banco', ['nombre'=>'ROMBO COMPAÑÍA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'JOHN DEERE CREDIT COMPAÑÍA FINANCIERA S.']);
        $this->insert('banco', ['nombre'=>'PSA FINANCE ARGENTINA COMPAÑÍA FINANCIER']);
        $this->insert('banco', ['nombre'=>'TOYOTA COMPAÑÍA FINANCIERA DE ARGENTINA']);
        $this->insert('banco', ['nombre'=>'NARANJA DIGITAL COMPAÑÍA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'MONTEMAR COMPAÑIA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'TRANSATLANTICA COMPAÑIA FINANCIERA S.A.']);
        $this->insert('banco', ['nombre'=>'CREDITO REGIONAL COMPAÑIA FINANCIERA S.A']);

        #actualizamos el nombre
        $this->update('banco', ['nombre'=>'BANCO PATAGONIA S.A.'], ['id'=>1]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210608_151832_lista_bancos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210608_151832_lista_bancos cannot be reverted.\n";

        return false;
    }
    */
}
