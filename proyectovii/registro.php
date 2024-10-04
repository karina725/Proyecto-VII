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

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Capturar datos del formulario
   $nombre_usuario = limpiar_cadena_html($_POST['nombre_usuario']);
   $email = limpiar_cadena_html($_POST['email']);
   $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña
   $id_rol = $_POST['id_rol'];
   $numero_empleado = limpiar_cadena_html($_POST['numero_empleado']);
   $nombre_completo = limpiar_cadena_html($_POST['nombre_completo']);
   $fecha_creacion = date('Y-m-d H:i:s');

   try {
      // Iniciar la transacción
      $db_con->beginTransaction();

      // Insertar el usuario
      $stmt = $db_con->prepare("INSERT INTO usuarios (nombre_usuario, email, user_pass, id_rol, fecha_creacion) VALUES (:nombre_usuario, :email, :password, :id_rol, :fecha_creacion)");
      $stmt->bindParam(':nombre_usuario', $nombre_usuario);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':id_rol', $id_rol);
      $stmt->bindParam(':fecha_creacion', $fecha_creacion);

      if ($stmt->execute()) {
         // Obtener el último ID insertado (id_usuario)
         $id_usuario = $db_con->lastInsertId();

         // Insertar el empleado usando el id_usuario recién creado
         $stmt_empleado = $db_con->prepare("INSERT INTO empleados (numero_empleado, nombre_completo, id_usuario) VALUES (:numero_empleado, :nombre_completo, :id_usuario)");
         $stmt_empleado->bindParam(':numero_empleado', $numero_empleado);
         $stmt_empleado->bindParam(':nombre_completo', $nombre_completo);
         $stmt_empleado->bindParam(':id_usuario', $id_usuario);

         if ($stmt_empleado->execute()) {
            // Confirmar la transacción
            $db_con->commit();
            echo "<div class='alert alert-success'>Usuario y empleado creados exitosamente.<br>
            <a href=\"index.php\">Ingresar al sistema</a></div>";
         } else {
            // Deshacer la transacción en caso de error
            $db_con->rollBack();
            echo "<div class='alert alert-danger'>Error al crear el empleado.</div>";
         }
      } else {
         // Deshacer la transacción en caso de error
         $db_con->rollBack();
         echo "<div class='alert alert-danger'>Error al crear el usuario.</div>";
      }
   } catch (PDOException $e) {
      $db_con->rollBack();
      echo "<div class='alert alert-danger'>Error en la operación: " . $e->getMessage() . "</div>";
   }
}
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

            <h2 class="mb-4">Registro de Usuario y Empleado</h2>
            <form method="POST">
               <!-- Sección de Usuario -->
               <h4>Información del Usuario</h4>
               <div class="form-group">
                  <label for="nombre_usuario">Nombre del Usuario</label>
                  <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" required>
               </div>
               <div class="form-group">
                  <label for="email">Correo Electrónico</label>
                  <input type="email" name="email" class="form-control" id="email" required>
               </div>
               <div class="form-group">
                  <label for="contraseña">Contraseña</label>
                  <input type="password" name="contraseña" class="form-control" id="contraseña" required>
               </div>
               <div class="form-group">
                  <label for="id_rol">Rol del Usuario</label>
                  <select name="id_rol" id="id_rol" class="form-control">
                     <option value="1">Administrador</option>
                     <option value="2">Empleado</option>
                     <option value="3">Usuario</option>
                  </select>
               </div>

               <hr>

               <!-- Sección de Empleado -->
               <h4>Información del Empleado</h4>
               <div class="form-group">
                  <label for="numero_empleado">Número de Empleado</label>
                  <input type="text" name="numero_empleado" class="form-control" id="numero_empleado" required>
               </div>
               <div class="form-group">
                  <label for="nombre_completo">Nombre Completo del Empleado</label>
                  <input type="text" name="nombre_completo" class="form-control" id="nombre_completo" required>
               </div>

               <button type="submit" class="btn btn-primary">Registrar Usuario y Empleado</button>
            </form>

         </div>

      </div><!-- END <div class="container"> -->


   </div><!-- END <div class="content"> -->
   <script type="text/javascript" src="script.js"></script>
</body>

</html>