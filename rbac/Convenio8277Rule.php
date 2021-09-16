<?php

namespace app\rbac;

use app\models\Prestacion;
use yii\rbac\Rule;

/**
 * Comprueba si un usuario pertenece a un programa
 */
class Convenio8277Rule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|int $user el ID de usuario.
     * @param Item $item el rol o permiso asociado a la regla
     * @param array $params parámetros pasados a ManagerInterface::checkAccess().
     * @return bool un valor indicando si la regla permite al rol o permiso con el que está asociado.
     */
    public function execute($user, $item, $param)
    {
        $prestacion = Prestacion::findOne([
            'id'=>$param['prestacionid'],
            'tipo_convenioid' => Prestacion::CONVENIO_8180,
        ]);

        return ($prestacion!==null) ? true : false;

    }
}