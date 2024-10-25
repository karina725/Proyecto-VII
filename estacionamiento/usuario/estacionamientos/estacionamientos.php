<?php

$table_cols = 9;

$stmt = $db_con->prepare("
    SELECT p.id_estacionamiento , e.numero_espacio , e.descripcion, e.placa, e.modelo, e.seguro,e.estado,e.fecha_creacion
    FROM estacionamientos p
    LEFT JOIN estacionamientos e ON p.id_estacionamiento = e.id_estacionamiento
");

$stmt->execute();
$estacionamientos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="bc-icons-2">    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?q=inicio"><?php echo $dic_inicio; ?></a></li>
        <li class="breadcrumb-item active"><?php echo $dic_estacionamientos; ?></li>
    </ol>
</div>

<div class="page-header">
    <h2 class="text-center">Gestión de Espacios de Estacionamiento</h2>
</div>

<table class="table table-fixed table-bordered table-striped table-hover">

    <thead class="thead-dark text-center">
        <tr>
            <th>Id Estacionamiento</th>
            <th>Numero de Espacio</th>
            <th>Descripción</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Seguro</th>
            <th>Estado</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($estacionamientos as $estacionamiento): ?>
            <tr>
                <td><?php echo imprimir_cadena($estacionamiento['id_estacionamiento']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['numero_espacio']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['descripcion']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['placa']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['modelo']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['seguro']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['estado']); ?></td>
                <td><?php echo imprimir_cadena($estacionamiento['fecha_creacion']); ?></td>

                <td>
                    <a href="?q=estacionamientos/editar/&id_estacionamiento=<?php echo $estacionamiento['id_estacionamiento']; ?>" class="btn btn-warning btn-sm"><?php echo $dic_editar_icon; ?></a>
                    <a href="?q=estacionamientos/eliminar/&id_estacionamiento=<?php echo $estacionamiento['id_estacionamiento']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este Estacionamiento?');"><?php echo $dic_eliminar_icon; ?></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    <tfoot>
        <tr class="text-center">
            <th colspan="<?php echo $table_cols; ?>" class="ts-pager">
                <?php echo $table_footer; ?>
            </th>
        </tr>

        <tr>
            <th colspan="<?php echo $table_cols; ?>" class="align-middle text-center">
                <a href="?q=estacionamientos/nueva/">
                    <div class="alert alert-info">Nuevo Registro</div>
                </a>
            </th>
        </tr>
    </tfoot>

</table>
