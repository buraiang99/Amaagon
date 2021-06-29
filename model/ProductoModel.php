<?php
class ProductoModel
{
    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    } // constructor

    public function registrarProducto($nombre,$precio,$idCategoria,$descripcion, $cantidad){
        $consulta = $this->db->prepare("call sp_registrar_producto('".$nombre."',".$precio.",'".$descripcion."')");
        $consulta->execute();
        $consulta->closeCursor();

        $consultaProducto = $this->db->prepare("call sp_buscar_producto('".$nombre."')");
        $consultaProducto->execute();
        $resultadoProducto=$consultaProducto->fetchAll();
        $consultaProducto->closeCursor();
        $data['lista'] = $resultadoProducto;
        foreach ($data['lista'] as $var) {
            $idProducto = $var[0];
            $consulta2 = $this->db->prepare("call sp_agregar_categoria_producto('".$idProducto."','".$idCategoria."')");
            $consulta2->execute();
            $consulta2->closeCursor();

            $consulta2 = $this->db->prepare("call sp_agregar_inventario('".$idProducto."','".$cantidad."')");
            $consulta2->execute();
            $consulta2->closeCursor();
        }
        /*$consultaCategoria = $this->db->prepare("call sp_buscar_categoria('".$nombreCategoria."')");
        $consultaCategoria->execute();
        $resultadoCategoria=$consultaCategoria->fetchAll();
        $consultaCategoria->closeCursor();
        $data['listaCategoria'] = $resultadoCategoria;
        $idCategoria = $data['listaCategoria'][0];*/

        /*$consulta2 = $this->db->prepare("call sp_agregar_categoria_producto('".$idCategoria."','".$idProducto."')");
        $consulta2->execute();
        $consulta2->closeCursor();*/

    }
}
?>