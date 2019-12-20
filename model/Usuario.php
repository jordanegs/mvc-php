<?php


class Usuario {
    public $nombre;
    public $apellido;
    public $correo;
    public $clave;

    public function __construct() {
        try {
            $this->pdo = Database::StartUp();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function login($correo, $clave){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE correo=? AND clave=?");
            $stm->execute(array($correo, $clave));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardarToken($token, $correo) {
        try {
            $sql = "UPDATE usuario SET verificar = ? WHERE correo = ?";
            $this->pdo->prepare($sql)->execute(array($token, $correo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificarToken($correo, $token){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE correo=? AND verificar=?");
            $stm->execute(array($correo, $token));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarContraseña($correo, $clave, $token) {
        try {
            $sql = "UPDATE usuario SET clave = ?, verificar = ? WHERE correo = ? AND verificar = ?";
            return $this->pdo->prepare($sql)->execute(array($clave, NULL, $correo, $token));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

}