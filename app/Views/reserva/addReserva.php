<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5">Nueva Reserva</h1>
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('reserva/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="fk_id_tipres">ID Tipo Reserva</label>
                    <input type="number" name="fk_id_tipres" id="fk_id_tipres" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fk_id_doc">ID Docente</label>
                    <input type="number" name="fk_id_doc" id="fk_id_doc" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fk_id_lab">ID Laboratorio</label>
                    <input type="number" name="fk_id_lab" id="fk_id_lab" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fk_id_area">ID Área</label>
                    <input type="number" name="fk_id_area" id="fk_id_area" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fk_id_guia">ID Guía</label>
                    <input type="number" name="fk_id_guia" id="fk_id_guia" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tema_res">Tema</label>
                    <input type="text" name="tema_res" id="tema_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="comentario_res">Comentario</label>
                    <textarea name="comentario_res" id="comentario_res" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="estado_res">Estado</label>
                    <input type="text" name="estado_res" id="estado_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_hora_res">Fecha y Hora</label>
                    <input type="datetime-local" name="fecha_hora_res" id="fecha_hora_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="duracion_res">Duración</label>
                    <input type="text" name="duracion_res" id="duracion_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_participantes_res">Número de Participantes</label>
                    <input type="number" name="numero_participantes_res" id="numero_participantes_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion_participantes_res">Descripción de Participantes</label>
                    <input type="text" name="descripcion_participantes_res" id="descripcion_participantes_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="materiales_res">Materiales</label>
                    <input type="text" name="materiales_res" id="materiales_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha_creacion_res">Fecha Creación</label>
                    <input type="date" name="fecha_creacion_res" id="fecha_creacion_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_actualizacion_res">Fecha Actualización</label>
                    <input type="date" name="fecha_actualizacion_res" id="fecha_actualizacion_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="usuario_creacion_res">Usuario Creación</label>
                    <input type="text" name="usuario_creacion_res" id="usuario_creacion_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="usuario_actualizacion_res">Usuario Actualización</label>
                    <input type="text" name="usuario_actualizacion_res" id="usuario_actualizacion_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_hora_fin_res">Fecha Hora Fin</label>
                    <input type="datetime-local" name="fecha_hora_fin_res" id="fecha_hora_fin_res" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="observaciones_finales_res">Observaciones Finales</label>
                    <input type="text" name="observaciones_finales_res" id="observaciones_finales_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="asistencia_res">Asistencia</label>
                    <input type="text" name="asistencia_res" id="asistencia_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="guia_adjunta_res">Guía Adjunta</label>
                    <input type="text" name="guia_adjunta_res" id="guia_adjunta_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="curso_res">Curso</label>
                    <input type="text" name="curso_res" id="curso_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="materia_res">Materia</label>
                    <input type="text" name="materia_res" id="materia_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fk_id_car">ID Carrera</label>
                    <input type="number" name="fk_id_car" id="fk_id_car" class="form-control">
                </div>
                <div class="form-group">
                    <label for="paralelo_res">Paralelo</label>
                    <input type="text" name="paralelo_res" id="paralelo_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tipo_texto_res">Tipo Texto</label>
                    <input type="text" name="tipo_texto_res" id="tipo_texto_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fk_id_usu">ID Usuario</label>
                    <input type="number" name="fk_id_usu" id="fk_id_usu" class="form-control">
                </div>
                <div class="form-group">
                    <label for="software_res">Software</label>
                    <input type="text" name="software_res" id="software_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tipo_res">Tipo</label>
                    <input type="text" name="tipo_res" id="tipo_res" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pedidodocente_res">Pedido Docente</label>
                    <input type="text" name="pedidodocente_res" id="pedidodocente_res" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
