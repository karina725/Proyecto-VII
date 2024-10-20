<?php
switch ($page) {

        #### //// USUARUIS
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
        #### //// TERMINA USUARUIS
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
        #### //// GESTION DE ESPACIOS
    case "gestion-espacios/":
        include_once('includes/php/tablesorter.php');
        include_once('gestion_espacios/gestion_espacios.php');
        break;

    case "gestion-espacios/eliminar/":
        include_once('gestion_espacios/gestion_espacios_eliminar.php');
        break;

    case "gestion-espacios/editar/":
        include_once('gestion_espacios/gestion_espacios_editar.php');
        break;

    case "gestion-espacios/actualizar/":
        include_once('gestion_espacios/gestion_espacios_actualizar.php');
        break;

        #### //// TERMINA GESTION DE ESPACIOS

        #### //// INICIA CATALOGOS
    case "catalogos/secciones-estacionamiento/":
        include_once('includes/php/tablesorter.php');
        include_once('catalogos/secciones_estacionamiento/secciones_estacionamiento.php');
        break;

    case "catalogos/secciones-estacionamiento/nuevo/":
        include_once('catalogos/secciones_estacionamiento/secciones_estacionamiento_nuevo.php');
        break;

    case "catalogos/secciones-estacionamiento/insertar/":
        include_once('catalogos/secciones_estacionamiento/secciones_estacionamiento_insertar.php');
        break;

    case "catalogos/secciones-estacionamiento/editar/":
        include_once('catalogos/secciones_estacionamiento/secciones_estacionamiento_editar.php');
        break;

    case "catalogos/secciones-estacionamiento/actualizar/":
        include_once('catalogos/secciones_estacionamiento/secciones_estacionamiento_actualizar.php');
        break;
        #### //// TERMINA CATALOGOS
    case "exit":
        include_once("logout.php");
        break;

    default:
        include("inicio.php");
        break;
} #### //// END switch($pagina)
