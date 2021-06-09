<?php

use yii\db\Migration;

/**
 * Class m210609_155318_update_banco
 */
class m210609_155318_update_banco extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'banco';
        $this->addColumn($table, 'codigo', $this->string(3));

        $this->update($table, ['codigo' => '007','nombre' => 'Banco De Galicia Y Buenos Aires S.A.U.'], ['nombre' => 'BANCO DE GALICIA Y BUENOS AIRES S.A.U.']);
        $this->update($table, ['codigo' => '011','nombre' => 'Banco De La Nacion Argentina'], ['nombre' => 'BANCO DE LA NACION ARGENTINA']);
        $this->update($table, ['codigo' => '014','nombre' => 'Banco De La Provincia De Buenos Aires'], ['nombre' => 'BANCO DE LA PROVINCIA DE BUENOS AIRES']);
        $this->update($table, ['codigo' => '015','nombre' => 'Industrial And Commercial Bank Of China'], ['nombre' => 'INDUSTRIAL AND COMMERCIAL BANK OF CHINA']);
        $this->update($table, ['codigo' => '016','nombre' => 'Citibank N.A.'], ['nombre' => 'CITIBANK N.A.']);
        $this->update($table, ['codigo' => '017','nombre' => 'Banco Bbva Argentina S.A.'], ['nombre' => 'BANCO BBVA ARGENTINA S.A.']);
        $this->update($table, ['codigo' => '020','nombre' => 'Banco De La Provincia De Cordoba S.A.'], ['nombre' => 'BANCO DE LA PROVINCIA DE CORDOBA S.A.']);
        $this->update($table, ['codigo' => '027','nombre' => 'Banco Supervielle S.A.'], ['nombre' => 'BANCO SUPERVIELLE S.A.']);
        $this->update($table, ['codigo' => '029','nombre' => 'Banco De La Ciudad De Buenos Aires'], ['nombre' => 'BANCO DE LA CIUDAD DE BUENOS AIRES']);
        $this->update($table, ['codigo' => '034','nombre' => 'Banco Patagonia S.A.'], ['nombre' => 'BANCO PATAGONIA S.A.']);
        $this->update($table, ['codigo' => '044','nombre' => 'Banco Hipotecario S.A.'], ['nombre' => 'BANCO HIPOTECARIO S.A.']);
        $this->update($table, ['codigo' => '045','nombre' => 'Banco De San Juan S.A.'], ['nombre' => 'BANCO DE SAN JUAN S.A.']);
        $this->update($table, ['codigo' => '065','nombre' => 'Banco Municipal De Rosario'], ['nombre' => 'BANCO MUNICIPAL DE ROSARIO']);
        $this->update($table, ['codigo' => '072','nombre' => 'Banco Santander Rio S.A.'], ['nombre' => 'BANCO SANTANDER RIO S.A.']);
        $this->update($table, ['codigo' => '083','nombre' => 'Banco Del Chubut S.A.'], ['nombre' => 'BANCO DEL CHUBUT S.A.']);
        $this->update($table, ['codigo' => '086','nombre' => 'Banco De Santa Cruz S.A.'], ['nombre' => 'BANCO DE SANTA CRUZ S.A.']);
        $this->update($table, ['codigo' => '093','nombre' => 'Banco De La Pampa Sociedad De Economía M'], ['nombre' => 'BANCO DE LA PAMPA SOCIEDAD DE ECONOMÍA M']);
        $this->update($table, ['codigo' => '094','nombre' => 'Banco De Corrientes S.A.'], ['nombre' => 'BANCO DE CORRIENTES S.A.']);
        $this->update($table, ['codigo' => '097','nombre' => 'Banco Provincia Del Neuquén Sociedad Anó'], ['nombre' => 'BANCO PROVINCIA DEL NEUQUÉN SOCIEDAD ANÓ']);
        $this->update($table, ['codigo' => '143','nombre' => 'Brubank S.A.U.'], ['nombre' => 'BRUBANK S.A.U.']);
        $this->update($table, ['codigo' => '147','nombre' => 'Banco Interfinanzas S.A.'], ['nombre' => 'BANCO INTERFINANZAS S.A.']);
        $this->update($table, ['codigo' => '150','nombre' => 'Hsbc Bank Argentina S.A.'], ['nombre' => 'HSBC BANK ARGENTINA S.A.']);
        $this->update($table, ['codigo' => '158','nombre' => 'Open Bank Argentina S.A.'], ['nombre' => 'OPEN BANK ARGENTINA S.A.']);
        $this->update($table, ['codigo' => '165','nombre' => 'Jpmorgan Chase Bank, National Associatio'], ['nombre' => 'JPMORGAN CHASE BANK, NATIONAL ASSOCIATIO']);
        $this->update($table, ['codigo' => '191','nombre' => 'Banco Credicoop Cooperativo Limitado'], ['nombre' => 'BANCO CREDICOOP COOPERATIVO LIMITADO']);
        $this->update($table, ['codigo' => '198','nombre' => 'Banco De Valores S.A.'], ['nombre' => 'BANCO DE VALORES S.A.']);
        $this->update($table, ['codigo' => '247','nombre' => 'Banco Roela S.A.'], ['nombre' => 'BANCO ROELA S.A.']);
        $this->update($table, ['codigo' => '254','nombre' => 'Banco Mariva S.A.'], ['nombre' => 'BANCO MARIVA S.A.']);
        $this->update($table, ['codigo' => '259','nombre' => 'Banco Itau Argentina S.A.'], ['nombre' => 'BANCO ITAU ARGENTINA S.A.']);
        $this->update($table, ['codigo' => '262','nombre' => 'Bank Of America, National Association'], ['nombre' => 'BANK OF AMERICA, NATIONAL ASSOCIATION']);
        $this->update($table, ['codigo' => '266','nombre' => 'Bnp Paribas'], ['nombre' => 'BNP PARIBAS']);
        $this->update($table, ['codigo' => '268','nombre' => 'Banco Provincia De Tierra Del Fuego'], ['nombre' => 'BANCO PROVINCIA DE TIERRA DEL FUEGO']);
        $this->update($table, ['codigo' => '269','nombre' => 'Banco De La Republica Oriental Del Urugu'], ['nombre' => 'BANCO DE LA REPUBLICA ORIENTAL DEL URUGU']);
        $this->update($table, ['codigo' => '277','nombre' => 'Banco Saenz S.A.'], ['nombre' => 'BANCO SAENZ S.A.']);
        $this->update($table, ['codigo' => '281','nombre' => 'Banco Meridian S.A.'], ['nombre' => 'BANCO MERIDIAN S.A.']);
        $this->update($table, ['codigo' => '285','nombre' => 'Banco Macro S.A.'], ['nombre' => 'BANCO MACRO S.A.']);
        $this->update($table, ['codigo' => '299','nombre' => 'Banco Comafi Sociedad Anonima'], ['nombre' => 'BANCO COMAFI SOCIEDAD ANONIMA']);
        $this->update($table, ['codigo' => '300','nombre' => 'Banco De Inversion Y Comercio Exterior S'], ['nombre' => 'BANCO DE INVERSION Y COMERCIO EXTERIOR S']);
        $this->update($table, ['codigo' => '301','nombre' => 'Banco Piano S.A.'], ['nombre' => 'BANCO PIANO S.A.']);
        $this->update($table, ['codigo' => '305','nombre' => 'Banco Julio Sociedad Anonima'], ['nombre' => 'BANCO JULIO SOCIEDAD ANONIMA']);
        $this->update($table, ['codigo' => '309','nombre' => 'Banco Rioja Sociedad Anonima Unipersonal'], ['nombre' => 'BANCO RIOJA SOCIEDAD ANONIMA UNIPERSONAL']);
        $this->update($table, ['codigo' => '310','nombre' => 'Banco Del Sol S.A.'], ['nombre' => 'BANCO DEL SOL S.A.']);
        $this->update($table, ['codigo' => '311','nombre' => 'Nuevo Banco Del Chaco S. A.'], ['nombre' => 'NUEVO BANCO DEL CHACO S. A.']);
        $this->update($table, ['codigo' => '312','nombre' => 'Banco Voii S.A.'], ['nombre' => 'BANCO VOII S.A.']);
        $this->update($table, ['codigo' => '315','nombre' => 'Banco De Formosa S.A.'], ['nombre' => 'BANCO DE FORMOSA S.A.']);
        $this->update($table, ['codigo' => '319','nombre' => 'Banco Cmf S.A.'], ['nombre' => 'BANCO CMF S.A.']);
        $this->update($table, ['codigo' => '321','nombre' => 'Banco De Santiago Del Estero S.A.'], ['nombre' => 'BANCO DE SANTIAGO DEL ESTERO S.A.']);
        $this->update($table, ['codigo' => '322','nombre' => 'Banco Industrial S.A.'], ['nombre' => 'BANCO INDUSTRIAL S.A.']);
        $this->update($table, ['codigo' => '330','nombre' => 'Nuevo Banco De Santa Fe Sociedad Anonima'], ['nombre' => 'NUEVO BANCO DE SANTA FE SOCIEDAD ANONIMA']);
        $this->update($table, ['codigo' => '331','nombre' => 'Banco Cetelem Argentina S.A.'], ['nombre' => 'BANCO CETELEM ARGENTINA S.A.']);
        $this->update($table, ['codigo' => '332','nombre' => 'Banco De Servicios Financieros S.A.'], ['nombre' => 'BANCO DE SERVICIOS FINANCIEROS S.A.']);
        $this->update($table, ['codigo' => '336','nombre' => 'Banco Bradesco Argentina S.A.U.'], ['nombre' => 'BANCO BRADESCO ARGENTINA S.A.U.']);
        $this->update($table, ['codigo' => '338','nombre' => 'Banco De Servicios Y Transacciones S.A.'], ['nombre' => 'BANCO DE SERVICIOS Y TRANSACCIONES S.A.']);
        $this->update($table, ['codigo' => '339','nombre' => 'Rci Banque S.A.'], ['nombre' => 'RCI BANQUE S.A.']);
        $this->update($table, ['codigo' => '340','nombre' => 'Bacs Banco De Credito Y Securitizacion S'], ['nombre' => 'BACS BANCO DE CREDITO Y SECURITIZACION S']);
        $this->update($table, ['codigo' => '341','nombre' => 'Banco Masventas S.A.'], ['nombre' => 'BANCO MASVENTAS S.A.']);
        $this->update($table, ['codigo' => '384','nombre' => 'Wilobank S.A.'], ['nombre' => 'WILOBANK S.A.']);
        $this->update($table, ['codigo' => '386','nombre' => 'Nuevo Banco De Entre Ríos S.A.'], ['nombre' => 'NUEVO BANCO DE ENTRE RÍOS S.A.']);
        $this->update($table, ['codigo' => '389','nombre' => 'Banco Columbia S.A.'], ['nombre' => 'BANCO COLUMBIA S.A.']);
        $this->update($table, ['codigo' => '426','nombre' => 'Banco Bica S.A.'], ['nombre' => 'BANCO BICA S.A.']);
        $this->update($table, ['codigo' => '431','nombre' => 'Banco Coinag S.A.'], ['nombre' => 'BANCO COINAG S.A.']);
        $this->update($table, ['codigo' => '432','nombre' => 'Banco De Comercio S.A.'], ['nombre' => 'BANCO DE COMERCIO S.A.']);
        $this->update($table, ['codigo' => '435','nombre' => 'Banco Sucredito Regional S.A.U.'], ['nombre' => 'BANCO SUCREDITO REGIONAL S.A.U.']);
        $this->update($table, ['codigo' => '448','nombre' => 'Banco Dino S.A.'], ['nombre' => 'BANCO DINO S.A.']);
        $this->update($table, ['codigo' => '515','nombre' => 'Bank Of China Limited Sucursal Buenos Ai'], ['nombre' => 'BANK OF CHINA LIMITED SUCURSAL BUENOS AI']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210609_155318_update_banco cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210609_155318_update_banco cannot be reverted.\n";

        return false;
    }
    */
}
