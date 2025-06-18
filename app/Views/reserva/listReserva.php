<?php
$this->extend('layouts/main_layout');
$session = session();
?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5">Listado de Reservas</h1>
            
            <!-- Botones de acción -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/reserva/create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nueva Reserva
                </a>
                
                <div class="btn-group">
                    <a href="/reserva" class="btn btn-secondary">
                        <i class="fas fa-sync"></i> Actualizar
                    </a>
                    <a href="/reserva/print" class="btn btn-info">
                        <i class="fas fa-print"></i> Imprimir
                    </a>
                </div>
            </div>

            <!-- Mensajes de sesión -->
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <!-- Tabla de reservas -->
            <div class="table-responsive">
                <?php if (isset($reservas)): ?>
                    <table id="reservaTable" class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Laboratorio</th>
                                <th>Docente</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Estado</th>
                                <th>Motivo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservas as $reserva): ?>
                                <tr>
                                    <td><?= esc($reserva['id_reserva']) ?></td>
                                    <td><?= esc($reserva['fk_id_lab']) ?></td>
                                    <td><?= esc($reserva['fk_id_doc']) ?></td>
                                    <td><?= esc($reserva['fecha_reserva']) ?></td>
                                    <td><?= esc($reserva['hora_inicio_reserva']) ?></td>
                                    <td><?= esc($reserva['hora_fin_reserva']) ?></td>
                                    <td><?= esc($reserva['estado_reserva']) ?></td>
                                    <td><?= esc($reserva['motivo_reserva']) ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/reserva/edit/<?= esc($reserva['id_reserva']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm btn-delete" 
                                                    data-id="<?= esc($reserva['id_reserva']) ?>"
                                                    data-nombre="<?= esc($reserva['motivo_reserva']) ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center text-danger">No se encontraron datos disponibles</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Manejar la inicialización de DataTables usando jQuery
    $(document).ready(function() {
        // Verificar si la tabla existe
        const table = $('#reservaTable');
        if (table.length) {
            console.log('Tabla encontrada');
            
            // Inicializar DataTables
            table.DataTable({
                "scrollX": true,
                "responsive": true,
                "language": {
                    "sEmptyTable": "No hay datos disponibles en la tabla",
                    "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "sInfoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sLengthMenu": "Mostrar _MENU_ entradas",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sPrevious": "Anterior",
                        "sNext": "Siguiente",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": activar para ordenar la columna de manera descendente"
                    }
                }
            });

            // Verificar si hay filas en la tabla
            const tbody = table.find('tbody');
            if (tbody.find('tr').length > 0) {
                console.log('Filas encontradas:', tbody.find('tr').length);
            } else {
                console.log('No se encontraron filas en la tabla');
            }
        } else {
            console.error('No se encontró la tabla');
        }

        <?php if (session()->has('debugError')): ?>
        console.error('DB Error:', <?= json_encode(session('debugError')) ?>);
        <?php endif; ?>
    });
</script>

<?= $this->endSection(); ?>
