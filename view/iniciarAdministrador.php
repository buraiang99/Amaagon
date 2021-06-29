<?php
include_once '../public/header.php';
?>
<div class="container pt-5 pb-5">
    <div class="row">
    <div class="col-4">
    </div>
        <div class="col-4">
            <form id="formularioAdmin">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contrasenna" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
                </div>
                <button type="button" class="btn btn-danger" href="javascript:;" onclick="buscarAdministrador($('#usuario').val(), $('#contrasenna').val());" id="iniciar" name="iniciar">Iniciar Sesión</button>
            </form>
        </div>
    </div>
    <div class="col-4">
        <span id="resultado"></span>
    </div>
</div>
<?php
include_once '../public/footer.php';
?>