<?php
include_once '../public/adminHeader.php'
?>
<script>
  $(document).ready(function() {
    console.log("document loaded");
    $.ajax({
      type: "GET",
      data: null,
      url: "http://127.0.0.1:80/APIREST/API/categoriaAPI.php",
    }).then(function(data) {
      var producto = JSON.parse(data)
      let res = document.querySelector('#listaCategorias');
      res.innerHTML = '<option selected>Seleccione la categoria</option>';
      //var cont = 1;
      producto.forEach(function(element) {

        res.innerHTML += `<option value="${element.id_categoria}">${element.nombre}</option>`
        //cont++;
      });

    });
  });
</script>
<div class="container">


  <form class="row g-3 pt-4 pb-4 px-4 py-4">
    <div class="col-md-4">
      <label for="nombreProducto" class="form-label">Nombre Producto</label>
      <input type="text" class="form-control" id="nombreProducto" required>
    </div>
    <div class="col-md-4">
      <label for="precio" class="form-label">Precio</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="dolar">$</span>
        <input type="number" class="form-control" id="precio" aria-describedby="dolar" required>
      </div>
    </div>
    <div class="col-md-3">
      <label for="listaCategorias" class="form-label">Categoria</label>
      <select class="form-select is-invalid" id="listaCategorias" aria-describedby="mensajeValidacion" required>
        <option selected disabled value="">Choose...</option>
      </select>
      <div id="mensajeValidacion" class="invalid-feedback">
        Por favor seleccione una categoría.
      </div>
    </div>
    <div class="col-md-3">
      <label for="cantidad">Cantidad</label>
      <input type="number" name="cantidad" id="cantidad">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripcion</label>
      <textarea class="form-control" id="descripcion" rows="3"></textarea>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="button" href="javascript:;" onclick="registrarProducto($('#nombreProducto').val(),$('#precio').val(),$('#descripcion').val(),$('#cantidad').val())">Registrar</button>
    </div>
    <div class="text-center">
      <span id="resultado"></span>
    </div>
  </form>
</div>
<?php
include_once '../public/adminFooter.php'
?>