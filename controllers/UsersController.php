<?php

require_once 'BaseController.php';
class UsersController extends BaseController 
{
    public function index(Request $request)
    {
        $page = $request->get('page') ?? 1;
        $search = $request->get('search') ?? '';
        $params = $search ? ['search' => $search] : [];

        $data = DB::table('users')
        ->where('carnet', 'LIKE', '%' . $search . '%')
        ->paginate(15, $page);
        $users = $data->getItems();
        $paginator = $data->renderPagination('/users', $params);
        return $this->view(
            'users/index',
            [
                'users' => $users,
                'paginator' => $paginator,
                'search' => $search
            ]
        );
    }

    public function create()
    {
        $grupos = DB::table('users_groups')->get();
        return $this->view('users/create', ["grupos" => $grupos]);
    }

    public function insert(Request $request)
    {
        $fields = [
            'nombres'  => 'El campo nombre es requerido',
            'apellidos'=> 'El campo apellido es requerido',
            'email'=> 'El campo email es requerido',
            'password'=> 'El campo contraseña es requerido',
            'grupo'=> 'El campo grupo es requerido',
        ];

        $validator = [];

        foreach($fields as $field => $error)
        {
            if (empty($request->post($field))) {
                $validator[] = $error;
            }
        }

        if (!empty($validator)) {
            $this->setFlash("Error al crear un usario", "danger");
            return $this->redirect('/users');
        }

        $nombres = $request->post('nombres');
        $apellidos = $request->post('apellidos');
        $email = $request->post('email');
        $password = $request->post('password');
        $grupo = $request->post('grupo');
        $file = $_FILES['imagen'];
        $imagen = "";
        $password_hash = password_hash(trim($password), PASSWORD_BCRYPT);
        $carnet = $this->generarCarnet();

        if ($file) {
            $upload_dir = "uploads/{$carnet}";
            if(!is_dir($upload_dir)){
                mkdir($upload_dir, 0777, true);
            }

            $imagen = time() . '_' . basename($file["name"]);

            $imagen_path = "{$upload_dir}/{$imagen}";
            if(!move_uploaded_file($file["tmp_name"], $imagen_path)) {
                $this->setFlash("Error al guardar imagen de usuario", "danger");
                return $this->redirect('/users');
            }
        }

        $result = DB::table('users')->insert(
            [
                'username'  => $carnet,
                'password'  => $password_hash,
                'nombres'  => trim($nombres),
                'apellidos'  => $apellidos,
                'imagen'  => $imagen,
                'carnet'  =>  $carnet,
                'id_user_group'  => $grupo
            ]
            );

            if($result > 0) {
                $this->setFlash("El usuario fue creado correctamente", "success");
                return $this->redirect('/users');
            }

            $this->setFlash("Error al crear un usario", "danger");
            return $this->redirect('/users');
    }

    public function generarCarnet($longitud = 10)
    {
        $prefijo = "C";
        $codigo_unico = $prefijo . uniqid("", true);
        $carnet = substr($codigo_unico, 0, $longitud);

        return $carnet;

    }
}