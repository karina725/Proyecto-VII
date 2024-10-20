<?php
if (isset($_GET['id_estacionamiento'])) {
    $id_estacionamiento = $_GET['id_estacionamiento'];

    // Query para eliminar el registro
    $sql = "DELETE FROM estacionamientos WHERE id_estacionamiento = $id_estacionamiento";

    // Verificar si la consulta se ejecuta correctamente
    if ($mysqli->query($sql) === TRUE) {
        // Mensaje de éxito
        echo '<div class="alert alert-success" role="alert">
                Registro eliminado correctamente.
              </div>';
?>
        <script type="text/javascript">
            document.location = ("?q=gestion-espacios/&mensaje=12");
        </script>
    <?php
    } else {
        // Mensaje de error
        echo '<div class="alert alert-danger" role="alert">
                Error al eliminar el registro: ' . $mysqli->error . '
              </div>';
        header("Refresh:2; url=?q=gestion-espacios/");
    ?>
        <script type="text/javascript">
            document.location = ("?q=gestion-espacios/&mensaje=3");
        </script>
<?php
    }
} else {
    echo '<div class="alert alert-warning" role="alert">
            No se ha proporcionado un ID de estacionamiento válido.
          </div>';
}
