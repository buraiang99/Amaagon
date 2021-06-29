<?php
include_once '../public/adminHeader.php'
?>
<script>
  $(document).ready(function() {
    function mostrarArticulos() {
      $.ajax({
        data: null,
        url: '../?controlador=Historial&accion=listarHistorial',
        type: 'GET',
        success: function(data) {
            $('#tbodyHistorial').html(data)
        }
      });
    }
    mostrarArticulos();
  })
</script>
<div class="container pt-5">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID Orden</th>
        <th scope="col">ID Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Precio Total</th>
        <th scope="col">ID Usuario</th>
        <th scope="col">Fecha</th>
        <th scope="col">Total Pagado</th>
      </tr>
    </thead>
    <tbody id="tbodyHistorial">
    </tbody>
  </table>
</div>
<?php
include_once '../public/adminFooter.php'
?>