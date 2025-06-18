<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mt-5">Lista de Laboratorios</h1>

<!-- Botón para agregar un nuevo laboratorio -->
<div class="text-right mb-3">
    <a href="<?= base_url('laboratorio/create'); ?>" class="btn btn-success">Agregar Laboratorio</a>
</div>

<!-- Tabla de Laboratorios -->
<table id="laboratorioTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Ubicación</th>
            <th>Color</th>
            <th>Siglas</th>
            <th>Paralelo/Guía</th>
            <th>Facultad</th>
            <th>Fecha Creación</th>
            <th>Fecha Actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laboratorios as $laboratorio): ?>
            <tr>
                <td><?= esc($laboratorio['id_lab']) ?></td>
                <td><?= esc($laboratorio['nombre_lab']) ?></td>
                <td><?= esc($laboratorio['descripcion_lab']) ?></td>
                <td><?= esc($laboratorio['tipo_lab']) ?></td>
                <td><?= esc($laboratorio['ubicacion_lab']) ?></td>
                <td><?= esc($laboratorio['color_lab']) ?></td>
                <td><?= esc($laboratorio['siglas_lab']) ?></td>
                <td><?= esc($laboratorio['paralelo_guia']) ?></td>
                <td><?= esc($laboratorio['facultad_lab']) ?></td>
                <td><?= esc($laboratorio['fecha_creacion_lab']) ?></td>
                <td><?= esc($laboratorio['fecha_actualizacion_lab']) ?></td>
                <td>
                    <a href="<?= base_url('laboratorio/edit/' . $laboratorio['id_lab']) ?>" 
                       class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button type="button" 
                            class="btn btn-sm btn-danger ml-2 btn-delete" 
                            data-id="<?= $laboratorio['id_lab'] ?>"
                            data-nombre="<?= esc($laboratorio['nombre_lab']) ?>">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>
