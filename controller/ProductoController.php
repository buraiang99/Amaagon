<?php
class ProductoController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function registrarProducto()
    {
        require 'model/ProductoModel.php';
        $productoModel = new ProductoModel();
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $idCategoria = $_POST["idCategoria"];
        $descripcion = $_POST["descripcion"];
        $cantidad = $_POST['cantidad'];
        $productoModel->registrarProducto($nombre,$precio,$idCategoria,$descripcion,$cantidad);
        echo 1;
    }
}
?>