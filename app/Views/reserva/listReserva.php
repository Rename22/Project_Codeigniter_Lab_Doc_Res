<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5">Listado de Reservas</h1>

            <!-- Botones de acción -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="<?= site_url('reserva/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nueva Reserva
                </a>
            </div>

            <!-- Mensajes -->
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>

            <!-- Tabla de reservas -->
            <div class="table-responsive">
                <table id="reservaTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tema</th>
                            <th>Comentario</th>
                            <th>Estado</th>
                            <th>Fecha/Hora</th>
                            <th>Duración</th>
                            <th>Participantes</th>
                            <th>Fecha Creación</th>
                            <th>Fecha Actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#reservaTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?= site_url('reserva/datatables') ?>',
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
            },
            columns: [
                { data: 'id_reserva' },
                { data: 'tema_res' },
                { data: 'comentario_res' },
                { data: 'estado_reserva' },
                { data: 'fecha_hora_res' },
                { data: 'duracion_res' },
                { data: 'numero_participantes_res' },
                { data: 'fecha_creacion_res' },
                { data: 'fecha_actualizacion_res' },
                {
                    data: 'id_reserva',
                    orderable: false,
                    render: function(data, type, row) {
                        return `<div class="btn-group">
                                    <a href="<?= site_url('reserva/edit') ?>/${data}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?= site_url('reserva/delete') ?>/${data}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')"><i class="fas fa-trash"></i></a>
                                </div>`;
                    }
                }
            ],
            scrollX: true,
            responsive: true
        });
    });
</script>

<?= $this->endSection() ?>
