<?php
switch ($page) {

    case "usuarios/":
        include_once('includes/php/tablesorter.php');
        include_once('usuarios/usuarios.php');
        break;

    case "usuarios/eliminar/":
        include_once('usuarios/usuarios_eliminar.php');
        break;

    case "usuarios/editar/":
        include_once('usuarios/usuarios_editar.php');
        break;

    case "usuarios/actualizar/":
        include_once('usuarios/usuarios_actualizar.php');
        break;

    case "exit":
        include_once("logout.php");
        break;

    default:
        include("inicio.php");
        break;
} #### //// END switch($pagina)
