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
                    <tbody>
                        <?php if (!empty($reservas)): ?>
                            <?php foreach ($reservas as $reserva): ?>
                                <tr>
                                    <td><?= esc($reserva['id_res']) ?></td>
                                    <td><?= esc($reserva['tema_res']) ?></td>
                                    <td><?= esc($reserva['comentario_res']) ?></td>
                                    <td><?= esc($reserva['estado_res']) ?></td>
                                    <td><?= esc($reserva['fecha_hora_res']) ?></td>
                                    <td><?= esc($reserva['duracion_res']) ?></td>
                                    <td><?= esc($reserva['numero_participantes_res']) ?></td>
                                    <td><?= esc($reserva['fecha_creacion_res']) ?></td>
                                    <td><?= esc($reserva['fecha_actualizacion_res']) ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= site_url('reserva/edit/' . $reserva['id_res']) ?>" 
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= site_url('reserva/delete/' . $reserva['id_res']) ?>" 
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">No se encontraron reservas</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
