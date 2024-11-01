<?php

require_once 'BaseController.php';

class MateriasController extends BaseController
{
    public function index(Request $request)
    {
        $page = $request->get('page') ?? 1;
        $search = $request->get('search') ?? '';
        $params = $search ? ['search' => $search] : [];
        $data = DB::table('asignaturas')->where('name', 'LIKE', '%' . $search . '%')->paginate(15, $page);
        $materias = $data->getItems();
        $paginator = $data->renderPagination('/materias', $params);
        return $this->view(
            'materias/index',
            [
                'materias' => $materias,
                'paginator' => $paginator,
                'search' => $search
            ]
        );
    }
    public function create()
    {
        return $this->view('materias/create');
    }
    
    public function insert(Request $request)
    {
        $name = $request->post('name');
        if (!$name) {
            return $this->view('/materias/create',
            [
                'validator' => [
                    "El nombre de la materia es requerido"
                ]
            ]
            );
        }
        $result = DB::table('asignaturas')->insert(
            [
                'name' => trim($name)
            ]
            );
            if($result > 0) {
            return $this->redirect('/materias');
            }
            return $this->view('/materias/create',
            [
                'validator' => [
                    "No se pudo guardar el registro"
                ]
            ]
            );
    }
}