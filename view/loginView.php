<?php
include_once '../public/header.php';
?>
<div class="container pt-5 pb-5">
    <div class="row">
    <div class="col-4">
    </div>
        <div class="col-4">
            <form>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Usuario</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="InputPassword">
                </div>
                <button type="submit" class="btn btn-danger">Iniciar Sesión</button>
            </form>
        </div>
    </div>
    <div class="col-4">
    </div>
</div>
<?php
include_once '../public/footer.php';
?>