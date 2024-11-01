<?php
require_once 'config/TemplateEngine.php';

class BaseController {

    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    protected function view($name, $data = [])
    {
        $template = new TemplateEngine('views/'.$name.'.php');
        return $template->render($data);
    }

    protected function redirect($url) {
        header('Location: '.$url);
        exit();
    }
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
    protected function error($message, $code = 500) {
        http_response_code($code);
        echo $message;
        exit();
    }
    protected function abort($code = 404) {
        http_response_code($code);
        echo 'Pagina no encontrada';
        exit();
    }

    protected function setFlash($message, $type = "success")
    {
        $_SESSION['flash_message'] = [
            'type' => $type,
            'message' => $message
        ];
    }
}
?>