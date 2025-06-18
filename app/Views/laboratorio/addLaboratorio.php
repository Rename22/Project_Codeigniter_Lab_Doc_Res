<?= $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mt-5">Agregar Nuevo Laboratorio</h1>

<form action="<?= base_url('laboratorio/store'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="form-group">
        <label for="nombre_lab">Nombre</label>
        <input type="text" class="form-control" id="nombre_lab" name="nombre_lab" required>
    </div>

    <div class="form-group">
        <label for="descripcion_lab">Descripción</label>
        <textarea class="form-control" id="descripcion_lab" name="descripcion_lab" rows="3" required></textarea>
    </div>

    <!-- Campo 'tipo_lab' con opciones -->
    <div class="form-group">
        <label for="tipo_lab">Tipo de Laboratorio</label>
        <select class="form-control" id="tipo_lab" name="tipo_lab" required>
            <option value="Docencia">Docencia</option>
            <!-- Agregar más tipos de laboratorio si es necesario -->
        </select>
    </div>

    <div class="form-group">
        <label for="ubicacion_lab">Ubicación</label>
        <input type="text" class="form-control" id="ubicacion_lab" name="ubicacion_lab" required>
    </div>

    <div class="form-group">
        <label for="color_lab">Color</label>
        <input type="text" class="form-control" id="color_lab" name="color_lab" required>
    </div>

    <div class="form-group">
        <label for="siglas_lab">Siglas</label>
        <input type="text" class="form-control" id="siglas_lab" name="siglas_lab" required>
    </div>

    <div class="form-group">
        <label for="paralelo_guia">Paralelo Guía</label>
        <input type="text" class="form-control" id="paralelo_guia" name="paralelo_guia" required>
    </div>

    <!-- Campo 'facultad_lab' con opciones -->
    <div class="form-group">
        <label for="facultad_lab">Facultad</label>
        <select class="form-control" id="facultad_lab" name="facultad_lab" required>
            <option value="FACULTAD DE CIENCIAS DE LA INGENIERÍA Y APLICADAS">FACULTAD DE CIENCIAS DE LA INGENIERÍA Y APLICADAS</option>
            <option value="FACULTAD DE CIENCIAS AGROPECUARIAS Y RECURSOS NATURALES">FACULTAD DE CIENCIAS AGROPECUARIAS Y RECURSOS NATURALES</option>
            <option value="CIENCIAS ADMINISTRATIVAS Y ECONOMICAS">CIENCIAS ADMINISTRATIVAS Y ECONOMICAS</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?= $this->endSection(); ?>
