<?php
include_once '../public/header.php';
?>
<script>
  $(document).ready(function() {
    function mostrarArticulos() {
      $.ajax({
        data: null,
        url: '?controlador=Usuario&accion=obtenerIDUsuario',
        type: 'POST',
        success: function(data) {
          idUsuarioSesion = parseInt(data, 10)
          var parametros = {
            idUsuario: idUsuarioSesion
          };
          $.ajax({
            type: "GET",
            data: parametros,
            url: "https://lenguajesproyecto2.000webhostapp.com/API/historialAPI.php",
          }).then(function(data) {
            //console.log("Entrada: " + data);
            var producto = JSON.parse(data)
            let res = document.querySelector('#tbodyHistorial');
            res.innerHTML = '';
            producto.forEach(function(element) {
              res.innerHTML += `
      <tr>
        <td id="tdID">${element.id_detalleOrden}</td>
        <td id="tdNombre">${element.id_producto}</td>
        <td id="tdPrecio">${element.cantidad}</td>
        <td id="tdPrecio">$${element.precioUnitario}</td>
        <td id="tdPrecio">$${element.precioTotal}</td>
        <td id="tdPrecio">${element.fechaOrden}</td>
        <td id="tdPrecio">$${element.totalPagar}</td>
      </tr>
      `
            });
          });
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
        <th scope="col">Fecha</th>
        <th scope="col">Total Pagado</th>
      </tr>
    </thead>
    <tbody id="tbodyHistorial">
    </tbody>
  </table>
</div>
<?php
include_once '../public/footer.php';
?>
