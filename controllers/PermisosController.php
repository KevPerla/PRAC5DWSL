<?php

require_once 'BaseController.php';

class PermisosController extends BaseController
{
    public function index($id)
    {
        $grupo = DB::table('users_groups')->where('id', '=', $id)->first();
        if ($grupo) {
            $permisos_grupo = DB::table('groups_permissions')->where('id_user_group', '=', $id)->get();
            $permisos = DB::table('permissions')->get();

            if ($permisos_grupo) {
                return $this->view(
                    'permisos/edit',
                    [
                        'grupo' => $grupo,
                        'permisos_grupo' => $permisos_grupo,
                        'permisos' => $permisos
                    ]
                );
            }
            return $this->view(
                'permisos/create',
                [
                    'grupo' => $grupo,
                    'permisos' => $permisos
                ]
            );
        } else {
            $this->setFlash("El grupo no fue encontrado", "danger");
            return $this->redirect('/grupos');
        }
    }
}