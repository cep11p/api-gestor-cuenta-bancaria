<?php

namespace app\rbac;

use app\models\ProgramaHasUsuario;
use yii\rbac\Rule;

/**
 * Comprueba si un usuario pertenece a un programa
 */
class ConvenioRule extends Rule
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
        $progama_usuario = ProgramaHasUsuario::findOne([
            'programaid'=>$param['prestacion']['programaid'],
            'userid' => $user,
            'permiso' => $item->name
        ]);

        return ($progama_usuario!==null) ? true : false;

    }
}