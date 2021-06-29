<?php
//echo "usuario no encontrado";
class AdministradorController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function buscarAdmministrador()
    {
        require 'model/AdministradorModel.php';
        $administradorModel = new AdministradorModel();
        $usuario = $_POST['usuario'];
        $contrasenna = $_POST['contrasenna'];
        $data['lista'] = $administradorModel->buscarAdmin($usuario, $contrasenna);
        if (empty($data['lista']) == 0) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function registrarAdmin()
    {
        require 'model/AdministradorModel.php';
        $administradorModel = new AdministradorModel();
        $usuario = $_POST["usuario"];
        $contrasenna = $_POST["contrasenna"];
        $administradorModel->registrarAdmin($usuario, $contrasenna);
        echo 1;
    }
}
?>