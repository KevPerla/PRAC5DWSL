<?php

require_once 'BaseController.php';

class PermisosController extends BaseController
{
    public function index($id)
    {
        $grupo = DB::table('users_groups')->where('id', '=', $id)->first();
        
        if ($grupo) {

            $permisos = DB::table('permissions')->get();

            foreach($permisos as $permiso) {
                $permisos_grupo = DB::table('groups_permissions')
                ->where('id_user_group', '=', $id)
                ->where('id_permission', '=', $permiso->id)
                ->first();

                if ($permisos_grupo) {
                    $permiso->asigned = true;
                } else {
                    $permiso->asigned = false;
                }
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

    public function update(Request $request, $id)
    {
        $permisos_grupo = DB::table('groups_permissions')->where('id_user_group', '=', $id)->first();
        if ($permisos_grupo) {
            DB::table('groups_permissions')->where('id_user_group', '=', $id)->delete();
        }
        $permisos = $request->post('permisos');

        foreach($permisos as $permiso)
        {
            DB::table('groups_permissions')->insert(
                [
                    'id_user_group'  => $id,
                    'id_permission'  => $permiso,
                    'status'    => 1,
                ]
                );
        }
        $this->setFlash("Los permisos fueron asignados correctamente", "success");
            return $this->redirect('/grupos');
    }
}