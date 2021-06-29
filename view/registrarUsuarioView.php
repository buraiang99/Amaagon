<?php
include_once '../public/header.php';
?>
<div class="container pt-5 pb-5">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="col-md-6">
            <label for="contrasenna" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
        </div>
        <div class="col-12">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="col-md-2">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" required>
        </div>
        <div class="col-md-3">
            <label for="generoList" class="form-label">Genero</label>
            <select id="generoList" class="form-select">
                <option selected>Seleccione una opcion...</option>
                <option>Masculino</option>
                <option>Femenino</option>
            </select>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-danger" href="javascript:;" onclick="regitrarUsuario($('#nombre').val(),$('#contrasenna').val(),$('#direccion').val(),$('#edad').val());" id="registrar" name="registrar">Registrar</button>
        </div>
        <div class="col-12">
            <span id="resultado"></span>
        </div>
    </form>
</div>
<?php
include_once '../public/footer.php';
?>