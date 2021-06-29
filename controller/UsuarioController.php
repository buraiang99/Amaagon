<?php
session_start();
//echo "guardando sesion";
class UsuarioController
{
    public function __construct()
    {
        $this->view = new View();
    }
    public function iniciarSesion()
    {
        if ($_SESSION['id_usuario'] == null) {
            $_SESSION['id_usuario'] = $_POST['idUsuario'];
            echo $_SESSION['id_usuario'];
        } else {
            if ($_SESSION['id_usuario'] != null) {
                echo $_SESSION['id_usuario'];
            }
        }
        
        if ($_SESSION['nombreUsuario'] == null) {
            $_SESSION['nombreUsuario'] = $_POST['nombre'];
            echo $_SESSION['nombreUsuario'];
        } else {
            if ($_SESSION['nombreUsuario'] != null) {
                echo $_SESSION['nombreUsuario'];
            }
        }
        
    }

    public function obtenerIDUsuario()
    {
        if ($_SESSION['id_usuario'] != null) {
            echo $_SESSION['id_usuario'];
        }
    }
    public function cerrarSesion()
    {
        if ($_SESSION['id_usuario'] != null) {
            $_SESSION['id_usuario'] = 0;
        }
        if ($_SESSION['nombreUsuario'] != null) {
            $_SESSION['nombreUsuario'] = '';
        }
    }
}
?>