<?php

switch ($page) {

    //Usuarios
    case "usuarios/":
        include_once('includes/php/tablesorter.php');
        include_once('usuarios/usuarios.php');
        break;

    case "usuarios/eliminar/":
        include_once('usuarios/usuarios_eliminar.php');
        break;

    case "estacionamiestos/":
        include_once('../public/estacionamientos.php');
        break;

    case "eliminar_estacionamiento":  
        include_once("/../scripts/eliminar_estacionamiento.php"); 
        break;

    case "usuarios/editar/":
        include_once('usuarios/usuarios_editar.php');
        break;

    case "usuarios/actualizar/":
        include_once('usuarios/usuarios_actualizar.php');
        break;

    
    //Estacionamiento


    //Pensiones
    case "pensiones/":
        include_once('includes/php/tablesorter.php');
        include_once('pensiones/pensiones.php');
        break;

    case "pensiones/nueva/":
        include_once('pensiones/pensiones_nuevo.php');
        break;
        
    case "pensiones/editar/":
        include_once('pensiones/pensiones_editar.php');
        break;
        
    case "pensiones/eliminar/":
        include_once('pensiones/eliminar/pension_eliminar.php');
        break;


    //Lavados

    
    //Reserva Eventos
    case "reservas_evento/":
        include_once('includes/php/tablesorter.php');
        include_once('reservas_evento/reservas_evento.php');
        break;

    case "reservas_evento/nueva/":
        include_once('reservas_evento/nueva_reservas_evento.php');
        break;
        
    case "reservas_evento/editar/":
        include_once('reservas_evento/editar_reservas_evento.php');
        break;
        
    case "reservas_evento/eliminar/":
        include_once('reservas_evento/eliminar/eliminar_reservas_evento.php');
        break;


    case "exit":
        include_once("logout.php");
        break;

    default:
        include("inicio.php");
        break;
        
}
