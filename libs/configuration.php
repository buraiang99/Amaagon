<?php
    require 'libs/Config.php';
    $config= Config::singleton();
    $config->set('controllerFolder','controller/');
    $config->set('modelFolder', 'model/');
    $config->set('viewFolder', 'view/');
    
    /*$config->set('dbhost', 'localhost'); // ip
    $config->set('dbname', 'proyecto2lenguajes');
    $config->set('dbuser', 'root');
    $config->set('dbpass', ''); */
    $config->set('dbhost', '163.178.107.10:3306'); // ip
    $config->set('dbname', 'if4101_proyecto_2_b77582');
    $config->set('dbuser', 'laboratorios');
    $config->set('dbpass', 'KmZpo.2796');
?>

