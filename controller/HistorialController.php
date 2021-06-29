<?php
class HistorialController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function listarHistorial()
    {
        require 'model/HistorialModel.php';
        $historialModel = new HistorialModel();
        $data['lista'] = $historialModel->listar();
        $data['lista'];
        foreach ($data['lista'] as $var) {
            echo '<tr>
        <td id="tdID">'.$var[0].'</td>
        <td id="tdIdProducto">'.$var[1].'</td>
        <td id="tdCantidad">$'.$var[2].'</td>
        <td id="tdPrecioUnitario">$'.$var[3].'</td>
        <td id="tdPrecioTotal">$'.$var[4].'</td>
        <td id="tdIDUsuario">'.$var[5].'</td>
        <td id="tdFecha">$'.$var[6].'</td>
        <td id="tdTotalPagar">$'.$var[7].'</td>
      </tr>';
        }
    }
}
?>