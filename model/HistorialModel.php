<?php
class HistorialModel
{
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    } // constructor

    public function listar()
    {
        $consulta = $this->db->prepare("call sp_listar_historial()");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
}
?>