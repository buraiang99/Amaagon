<?php
include_once '../public/adminHeader.php';
?>
    <div class="container text-center ">
        <h2>Registrar nuevo administrador</h2>
    </div>
    <div class="container pt-5 pb-5">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="usuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required="required"/>
            </div>
            <div class="col-md-6">
                <label for="contrasenna" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasenna" name="contrasenna" required="required" />
            </div>
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary" href="javascript:;" onclick="registrarAdministrador($('#usuario').val(),$('#contrasenna').val());" id="registrarAdmin" name="registrarAdmin">Registrar</button>
            </div>
            <div class="col-12 text-center">
                <span id="resultado"></span>
            </div>
        </form>
    </div>

<?php
include_once '../public/adminFooter.php'
?>