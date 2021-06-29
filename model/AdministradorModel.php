<?php
class AdministradorModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    } // constructor

    public function buscarAdmin($usuario, $contrasenna){
        $consulta = $this->db->prepare("call sp_buscarAdministrador('".$usuario."','".$contrasenna."')");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function registrarAdmin($usuario, $contrasenna){
        $consulta = $this->db->prepare("call sp_registrarAdministrador('".$usuario."','".$contrasenna."')");
        $consulta->execute();
        $consulta->closeCursor();
    }

    public function eliminar($id){

    }
    public function actualizar($id, $nombre){
        
    }
}