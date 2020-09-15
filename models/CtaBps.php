<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class CtaBps extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
    
    public function importar() {
        if ($this->validate()) {
            $content = file_get_contents($this->file->tempName);
            $ctaBps_array = preg_split('/\n|\r\n?/', $content); 

            
            $content_array = array();
            $nombre_apellido = array();
            foreach ($ctaBps_array as $value) {
                $row = array();
                $row['convenio'] = trim(substr($value, 0, 4));
                $row['apellido'] = trim(utf8_encode(substr($value, 4, 30)));
                $row['nombre'] = trim(utf8_encode(substr($value, 34, 16)));
                $row['tipo_inscripcion'] = trim(utf8_encode(substr($value, 50, 3)));
                $row['nro_documento'] = preg_replace('/^0+/', '', trim(utf8_encode(substr($value, 62, 8))));
                $row['nacionalidad'] = trim(utf8_encode(substr($value, 72, 1)));
                $row['fecha_nacimiento'] = trim(utf8_encode(substr($value, 73, 8)));
                $row['sexo'] = trim(utf8_encode(substr($value, 81, 1)));
                $row['estado_civil'] = trim(utf8_encode(substr($value, 82, 1)));
                $row['calle'] = trim(utf8_encode(substr($value, 83, 19)));
                $row['altura'] = intval(trim(substr($value, 102, 9)));
                $row['localidad'] = trim(substr($value, 111, 30));
                $row['codigo_postal'] = intval(trim(substr($value, 141, 5)));
                $row['tipo_inscripcion'] = trim(substr($value, 179, 3));
                $row['cuil'] = trim(substr($value, 182, 11));
                $row['monto'] = intval(trim(substr($value, 193, 5)));
                $row['fecha'] = trim(substr($value, 216, 8));
                $row['cbu'] = trim(substr($value, 245, 27));
                $content_array[] = $row;
            }
            
            print_r($content_array);die();
//            
        } else {
            return false;
        }
    }
}