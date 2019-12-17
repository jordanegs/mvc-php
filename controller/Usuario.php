<?php
require_once 'model/Usuario.php';

class UsuarioController {
    public $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function Index(){
        $usuarios = $this->model->listar();

        require_once 'view/header.php';
        require_once 'view/navbar.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/footer.php';
    }

    public function reset(){
        if(isset($_REQUEST['email'])){
            $to_email = 'email@gmail.com';
            $subject = 'Recuperar Contraseña';
            $message = 'Para cambiar de contraseña de click en el siguiente enlace: ';
            $headers = 'From: email@gmail.com';
            mail($to_email,$subject,$message,$headers);

            header('Location: /');
        }

    }
}