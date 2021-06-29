<?php
class usuarioModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    } // constructor

    public function mostrarUsuarios()
    {       
        $consulta=$this->db->prepare("call sp_listarUsuario()");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function buscarUsuario($usuario, $contrasenna){
        $consulta = $this->db->prepare("call sp_buscarUsuario('".$usuario."','".$contrasenna."')");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function registrar($nombre, $contrasenna, $direccion, $edad, $genero){
        $consulta= $this->db->prepare("call sp_registrar_usuario('".$nombre."','".$contrasenna."','".$direccion."',".$edad.",'".$genero."')");
        $consulta->execute();
    }

    public function eliminar($id){

    }
    public function actualizar($id, $nombre){
        
    }
}
?>