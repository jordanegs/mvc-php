<?php
require_once 'model/Usuario.php';

class AuthController {
    public $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/auth/login.php';
        require_once 'view/footer.php';
    }

    public function acceso(){
        if(isset($_POST) && isset($_POST['correo']) && isset($_POST['clave'])){
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];

            if($correo != "" && $clave != ""){
                $usuario = $this->model->login($correo, $clave);
                if($usuario){
                    $_SESSION['usuario_id'] = $usuario->id;
                    $_SESSION['nombres'] = $usuario->nombre." ".$usuario->apellido;

                    header('Location: /');
                } else {
                    echo "<script>alert('Credenciales Incorrectas.'); window.location='./'; </script>";
                }
            }
        }
    }

    public function restablacer(){
        require_once 'view/header.php';
        require_once 'view/auth/reset.php';
        require_once 'view/footer.php';
    }

    public function enviarcorreo(){
        if(isset($_POST['correo'])){
            $token = md5(uniqid(microtime(), true));
            $correo = $_POST['correo'];
            $enlace = "https://$_SERVER[HTTP_HOST]/?c=auth&a=cambiarcontra&e=$correo&t=$token";

            $to_email = $correo;
            $subject = "Recuperar Contraseña";
            $message = "Para cambiar de contraseña de click en el siguiente enlace: $enlace";
            $headers = "From: email@gmail.com";
            mail($to_email,$subject,$message,$headers);
            $this->model->guardarToken($token, $correo);

            header('Location: ./');
        } else {
            header('Location: ./?c=auth&a=restablacer');
        }
    }

    public function cambiarcontra() {
        if(isset($_REQUEST) && isset($_REQUEST['e']) && isset($_REQUEST['t'])){
            $correo = $_REQUEST["e"];
            $token = $_REQUEST["t"];

            if($correo != "" && $token != ""){
                $usuario = $this->model->verificarToken($correo, $token);
                if($usuario) {
                    require_once 'view/header.php';
                    require_once 'view/auth/cambiar-clave.php';
                    require_once 'view/footer.php';
                } else {
                    echo "<script>alert('Token Incorrecto.'); window.location='./'; </script>";
                }
            } else {
                echo "<script>alert('Token Incorrecto.'); window.location='./'; </script>";
            }
        }
    }

    public function actualizarcontra(){
        if(isset($_POST) && isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['token'])){
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $token = $_POST['token'];

            if($correo != "" && $clave != "" && $token != ""){
                if($this->model->actualizarContraseña($correo, $clave, $token)){
                    header('Location: ./');
                } else {
                    echo "<script>alert('Error al Actualizar Contraseña.'); window.location='./'; </script>";
                }
            } else {
                echo "<script>alert('Error al Actualizar Contraseña.'); window.location='./'; </script>";
            }
        }

    }

    public function salir(){
        session_unset();
        session_destroy();

        header('Location: /');
    }
}

