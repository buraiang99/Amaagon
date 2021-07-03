<?php
include_once '../public/header.php';
?>
<script>
  $(document).ready(function() {
    //console.log("ejecutando");
    function mostrarArticulos() {
      //console.log("mostrar");
      $.ajax({
        data: null,
        url: '../?controlador=Usuario&accion=obtenerIDUsuario',
        type: 'POST',
        success: function(data) {
          idUsuarioSesion = parseInt(data, 10)
          var parametros = {
            idUsuario: idUsuarioSesion
          };
          //console.log("parametros " + idUsuarioSesion)
          $.ajax({
            type: "GET",
            data: parametros,
            url: "https://lenguajesproyecto2.000webhostapp.com/API/carritoAPI.php",
          }).then(function(data) {
            console.log("Entrada: " + data);
            var producto = JSON.parse(data)
            let res = document.querySelector('#tbodyCarrito');
            res.innerHTML = '';
            producto.forEach(function(element) {
              res.innerHTML += `
      <tr>
        <td id="tdID">${element.id_producto}</td>
        <td id="tdNombre">${element.nombre}</td>
        <td id="tdPrecio">$${element.precio}</td>
        <td id="tdCantidad">${element.cantidad}</td>
        <td id="tdTotal">$${element.total}</td>
        <td><button type="button" class="btn btn-danger" href="javascript:;" onclick="eliminarCarrito(${element.id_producto});" id="eliminar" name="eliminar">Eliminar</button></td>
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
<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Total</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody id="tbodyCarrito">
    </tbody>
  </table>
  <div class="container">
    <div class="">
      <button type="button" class="btn btn-danger" id="check" name="check" href="javascript:;" onclick="checkout();">Verificar Productos</button>
      <button type="button" class="btn btn-danger" id="pago" name="pago" href="javascript:;" onclick="simularPago();" disabled>Realizar pago</button>
    </div>
  </div>
</div>
<?php
include_once '../public/footer.php';
?>
