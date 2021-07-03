<?php
include_once '../public/header.php';
?>
<script>
    $( document ).ready(function() {
        console.log( "document loaded" );
        $.ajax({
    type: "GET",
    data: null,
    url: "https://lenguajesproyecto2.000webhostapp.com/API/categoriaAPI.php",
  }).then(function (data) {
    var producto = JSON.parse(data)
    let res = document.querySelector('#listaCategorias');
    res.innerHTML = '<option selected>Seleccione la categoria</option>';
    //var cont = 1;
    producto.forEach(function (element) {
      
      res.innerHTML += `<option value="${element.id_categoria}">${element.nombre}</option>`
      //cont++;
    });
    
  });
    });
</script>
<div class="container">
  

<section class="row pt-4 pb-4">
  <div class="col-6 px-4">
    <label for="nombreProducto" class="form-label">Nombre Producto</label>
    <input type="text" class="form-control" id="nombreProducto">
  </div>
  <div class="col-6 pt-4">
    <div class="input-group">
      <select class="form-select" id="listaCategorias" aria-label="Example select with button addon">
        <option selected>Seleccione la categoria</option>
      </select>
      <button class="btn btn-outline-danger" href="javascript:;" onclick="mostrarProductos($('#nombreProducto').val())" type="button"><img src="../public/img/lupa.png" alt="buscar"></button>
    </div>
  </div>
</section>

<section class="row pt-4 pb-4">
  <div class="col-12">
    <table class="table" id="tablaProducto">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Descripción</th>
          <!--<th scope="col">Agregar a favoritos</th>-->
          <th scope="col">Cantidad</th>
          <th scope="col">Agregar al carrito</th>
        </tr>
      </thead>
      <tbody id="tbodyProducto"></tbody>
    </table>
  </div>

</section>

<div>
    
</div>
</div>
<?php
include_once '../public/footer.php';
?>
