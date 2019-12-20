<?php
require_once 'model/Usuario.php';

class AuthController {
    public $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/login/login.php';
        require_once 'view/footer.php';
    }

    public function acceso(){
        if(isset($_REQUEST) && isset($_REQUEST['correo']) && isset($_REQUEST['correo'])){
            $correo = $_REQUEST['correo'];
            $clave = $_REQUEST['clave'];

            if($correo != "" && $clave != ""){
                $usuario = $this->model->login($correo, $clave);
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['nombres'] = $usuario->nombre." ".$usuario->apellido;

                header('Location: /');
            }
        }
    }

    public function salir(){
        session_unset();
        session_destroy();

        header('Location: /');
    }
}