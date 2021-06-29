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
            var datos = JSON.parse(data)
            let res = document.querySelector('#tbodyCategoria');
            //var cont = 1;
            datos.forEach(function(element) {
                res.innerHTML = '';
                datos.forEach(function(element) {
                    res.innerHTML += `
                    <tr>
                        <td id="tdID">${element.id_categoria}</td>
                        <td id="tdNombre">${element.nombre}</td>
                    </tr>
                    `
                });

            });

        });
    });
</script>
<div class="container">


    <form class="row g-3 pt-4 pb-4 px-4 py-4">
        <div class="col-md-4">
            <label for="nombreCategoria" class="form-label">Nombre Categoria</label>
            <input type="text" class="form-control" id="nombreCategoria" required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="button" href="javascript:;" onclick="registrarCategoria($('#nombreCategoria').val());">Registrar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody id="tbodyCategoria">

        </tbody>
    </table>
</div>
<?php
include_once '../public/adminFooter.php'
?>