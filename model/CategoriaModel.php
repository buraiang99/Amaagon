<?php
class CategoriaModel
{
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    } // constructor

    public function registrarCategoria($nombre)
    {
        $consulta = $this->db->prepare("call sp_registrar_categoria('".$nombre."')");
        $consulta->execute();
        $consulta->closeCursor();
    }
}
?>