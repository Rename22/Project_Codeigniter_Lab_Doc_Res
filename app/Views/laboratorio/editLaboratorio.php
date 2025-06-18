<?php $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mt-5">Editar Laboratorio</h1>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('laboratorio/update/' . $laboratorio['id_lab']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="nombre_lab">Nombre del Laboratorio</label>
                            <input type="text" class="form-control" id="nombre_lab" name="nombre_lab" 
                                   value="<?= esc($laboratorio['nombre_lab']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion_lab">Descripción</label>
                            <textarea class="form-control" id="descripcion_lab" name="descripcion_lab" 
                                      rows="3"><?= esc($laboratorio['descripcion_lab']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tipo_lab">Tipo de Laboratorio</label>
                            <input type="text" class="form-control" id="tipo_lab" name="tipo_lab" 
                                   value="<?= esc($laboratorio['tipo_lab']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="ubicacion_lab">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion_lab" name="ubicacion_lab" 
                                   value="<?= esc($laboratorio['ubicacion_lab']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="color_lab">Color</label>
                            <input type="text" class="form-control" id="color_lab" name="color_lab" 
                                   value="<?= esc($laboratorio['color_lab']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="siglas_lab">Siglas</label>
                            <input type="text" class="form-control" id="siglas_lab" name="siglas_lab" 
                                   value="<?= esc($laboratorio['siglas_lab']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="paralelo_guia">Paralelo/Guía</label>
                            <input type="text" class="form-control" id="paralelo_guia" name="paralelo_guia" 
                                   value="<?= esc($laboratorio['paralelo_guia']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="facultad_lab">Facultad</label>
                            <select class="form-control" id="facultad_lab" name="facultad_lab" required>
                                <option value="FACULTAD DE CIENCIAS DE LA INGENIERÍA Y APLICADAS" <?= $laboratorio['facultad_lab'] == 'FACULTAD DE CIENCIAS DE LA INGENIERÍA Y APLICADAS' ? 'selected' : '' ?>>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y APLICADAS</option>
                                <option value="FACULTAD DE CIENCIAS AGROPECUARIAS Y RECURSOS NATURALES" <?= $laboratorio['facultad_lab'] == 'FACULTAD DE CIENCIAS AGROPECUARIAS Y RECURSOS NATURALES' ? 'selected' : '' ?>>FACULTAD DE CIENCIAS AGROPECUARIAS Y RECURSOS NATURALES</option>
                                <option value="CIENCIAS ADMINISTRATIVAS Y ECONOMICAS" <?= $laboratorio['facultad_lab'] == 'CIENCIAS ADMINISTRATIVAS Y ECONOMICAS' ? 'selected' : '' ?>>CIENCIAS ADMINISTRATIVAS Y ECONOMICAS</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('laboratorio') ?>" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
