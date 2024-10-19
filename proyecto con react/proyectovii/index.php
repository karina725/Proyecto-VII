<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['user_session']) && !empty($_SESSION['user_session'])) {
   header("Location: usuario/");
   exit;
}
include_once('usuario/includes/php/conexion.php');
include_once('usuario/includes/php/diccionario.php');
include_once('usuario/includes/php/limpiar.php');

$convocatorias = 0;
if (array_key_exists('conv', $_POST)) {
   $convocatorias = clear_string1($_POST['conv'], $mysqli);
}
$texto_convocatoria = '';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>
      <?php echo $nombre_sistema_completo; ?>
   </title>
   <!-- Estilos -->
   <link href="style.css" rel="stylesheet" type="text/css" media="screen">
   <link rel="stylesheet" href="usuario/includes/css/font-awesome.min.css">
   <link href="usuario/includes/css/offcanvas.css" rel="stylesheet" type="text/css" media="screen">
   <link href="usuario/includes/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <!-- jQuery y jQuery UI -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <!-- Scripts adicionales -->
   <script src="usuario/includes/js/42b8149369.js" crossorigin="anonymous"></script>
   <script src="validation.min.js"></script>
   <script src="script.js"></script>

   <style>
      /* Estilos personalizados */
      body {
         background-color: #f8f9fa;
      }

      .container {
         display: flex;
         justify-content: center;
      }

      .card {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         width: 90%;
         max-width: 900px;
         margin: 0 auto;
      }

      .header-container {
         background-color: #0A345D;
         color: #fff;
         text-align: center;
         padding: 20px;
         border-top-left-radius: 10px;
         border-top-right-radius: 10px;
      }

      .header-container img {
         width: 300px;
      }

      .card-body {
         padding: 20px;
      }

      .card-text {
         color: #666;
         font-size: 16px;
         line-height: 1.5;
         margin-bottom: 20px;
      }

      .form-group label {
         font-weight: 600;
         color: #333;
      }

      .form-control {
         border-color: #ddd;
      }

      .btn-primary {
         background-color: #007bff;
         border-color: #007bff;
      }

      .btn-primary:hover {
         background-color: #0069d9;
         border-color: #0062cc;
      }

      #modalTerminosCondiciones {
         width: 90%;
         max-width: 90%;
         margin: 0 auto;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
      }

      #modalTitle {
         color: #000;
         font-size: 20px;
      }

      #terminos-contenido {
         color: #333;
         font-size: 16px;
      }


      @media (max-width: 576px) {
         .card {
            width: 100%;
            border-radius: 0;
            box-shadow: none;
         }

         .header-container {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
         }

         .header-container img {
            width: 90%;
         }
      }
   </style>
</head>

<body>
   <div class="content">

      <div class="container">
         <div class="card">
            <div class="header-container">
               <h3 class="card-title">Bienvenido al Sistema de Administrador de Estacionamientos</h3>
            </div>
            <div class="card-body">
               <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img src="usuario/images/banner.png" class="d-block w-100">
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">
                        <<< /span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">>></span>
                  </a>
               </div>
            </div>
            <div class="card-body">
               <p class="card-text text-center">
                  <b>Por favor, introduce tus credenciales para acceder al sistema.</b>
               </p>
            </div>
            <div class="form-container">
               <section id="ingreso_alumnos" class="tab-panel">
                  <div class="signin-form">
                     <div class="card card-container">
                        <form class="form-signin" method="post" id="login-form">
                           <h2 class="form-signin-heading login_title" style="text-align: center">Ingreso </h2>
                           <hr />
                           <div id="error">
                              <!-- error will be shown here ! -->
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Usuario" title="Usuario" name="user_email" id="user_email" required />
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control" placeholder="<?php echo $dic_password; ?>" title="Contraseña de ingreso" name="password" id="password" required />
                           </div>
                           <hr />
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary form-signin" name="btn-login" id="btn-login">
                                 <span class="glyphicon glyphicon-log-in"></span> &nbsp; Ingresar
                              </button>
                           </div>
                        </form>

                        <div class="alert alert-info">
                           ¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>
                        </div>
                     </div><!-- END  <div class="card card-container"> -->
                  </div><!-- END <div class="signin-form">  -->
                  <hr>
               </section>
               <!-- END <section id="ingreso_alumnos" class="tab-panel">  -->


            </div>

         </div><!-- END <div class="container"> -->


      </div><!-- END <div class="content"> -->
      <script type="text/javascript" src="script.js"></script>
</body>

</html>