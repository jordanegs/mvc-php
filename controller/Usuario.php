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
}