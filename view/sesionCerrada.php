<?php
include_once '../public/header.php';
if ($_SESSION['id_usuario'] != null) {
  $_SESSION['id_usuario'] = 0;
}
if ($_SESSION['nombreUsuario'] != null) {
  $_SESSION['nombreUsuario'] = '';
}
?>
<div class="text-center">
  <h3>Usted a cerrado sesion poravor dirajase al inicio</h3>
</div>
<?php
include_once '../public/footer.php';
?>