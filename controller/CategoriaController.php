<?php
class CategoriaController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function registrarCategoria()
    {
        require 'model/CategoriaModel.php';
        $categoriaModel = new CategoriaModel();
        $nombre = $_POST["nombre"];
        $categoriaModel->registrarCategoria($nombre);
        echo 1;
    }
}
?>