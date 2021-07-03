<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Proyecto 2 Lenguajes para aplicaciones comerciales</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/main.css">
        <script type="text/javascript" src="../public/js/jquery.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z8HTFCT5SP%22%3E</script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-Z8HTFCT5SP');
        </script>
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../public/img/quimicos.png" alt="logo" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="../view/homeView.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="../view/registrarUsuarioView.php">Registrar</a></li>
                        <li class="nav-item"><a class="nav-link" href="../view/iniciarSesionUsuarioView.php">Iniciar Sesion</a></li>
                        <li class="nav-item"><a class="nav-link" href="../view/sesionCerrada.php">Cerrar Sesion</a></li>
                        <li class="nav-item"><a class="nav-link" href="../view/IniciarAdministrador.php">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="../view/historialView.php">Historial</a></li>
                        <?php
                            session_start();
                            if ($_SESSION['id_usuario'] == null) {
                                $_SESSION['id_usuario'] = 0;
                                $idUsuario = $_SESSION['id_usuario'];
                            }
                            if ($_SESSION['id_usuario'] != null) {
                                $idUsuario = $_SESSION['id_usuario'];
                            } else {
                                $idUsuario = 5;
                            }
                            
                            
                            //echo '<li class="nav-item"><a class="nav-link" href="../view/carritoView.php"><button type="button" class="btn" href="javascript:;" onclick="abrirCarrito('.$idUsuario.');" id="carrito" name="carrito"><img src="../public/img/carro-de-la-compra.svg" alt="carrito" width="20" height="20"></button></a></li>' 
                            echo '<li class="nav-item"><a class="nav-link" href="../view/carritoView.php"><img src="../public/img/carro-de-la-compra.svg" alt="carrito" width="20" height="20"></a></li>'
                        ?>
                    </ul>
                    <?php 
                        if ($_SESSION['nombreUsuario'] == null) {
                            $_SESSION['nombreUsuario'] = '';
                            $nombreUsuario = $_SESSION['nombreUsuario'];
                        }
                        if ($_SESSION['nombreUsuario'] != null) {
                            $nombreUsuario = $_SESSION['nombreUsuario'];
                            echo '<span id="spanNombre">'.$nombreUsuario.'</span>';
                        }
                    ?>
                </div>
            </div>
        </nav>
        
