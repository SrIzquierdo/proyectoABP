<?php
    require_once 'config/config.php';
    $ruta=RutaPorDefecto;
    $controlador=ControladorPorDefecto;

    /* Pregunta si existe el controlador enviado por $_GET['controlador'] */
    if(isset($_GET['controlador'])){
        $ruta=strtolower($_GET['controlador']);
        $controlador=$_GET['controlador'];
    }
    require 'controller/'.$ruta.'.php';
    $Control = new $controlador();
    
    /*  Pregunta si existe el método enviado por $_GET['metodo'] y guarda los datos retornados en $datos */
    if(!isset($_GET['metodo'])){
        $_GET['metodo']='admin';
    }
    $datos=$Control->{$_GET['metodo']}();

    /* Mostrar la vista */
    include 'view/template/cabezera.html';
    include 'view/'.$Control->vista.'.php';
    include 'view/template/pie.html';