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

            <form action="/reserva/store" method="post">
                <div class="form-group">
                    <label for="fk_id_lab">Laboratorio</label>
                    <select name="fk_id_lab" id="fk_id_lab" class="form-control" required>
                        <option value="">Seleccione un laboratorio</option>
                        <?php foreach ($laboratorios as $laboratorio): ?>
                            <option value="<?= $laboratorio['id_lab'] ?>"><?= $laboratorio['nombre_lab'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fk_id_doc">Docente</label>
                    <select name="fk_id_doc" id="fk_id_doc" class="form-control" required>
                        <option value="">Seleccione un docente</option>
                        <?php foreach ($docentes as $docente): ?>
                            <option value="<?= $docente['id_doc'] ?>">
                                <?= $docente['nombre_doc'] . ' ' . $docente['primer_apellido_doc'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_reserva">Fecha</label>
                    <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="hora_inicio_reserva">Hora Inicio</label>
                    <input type="time" name="hora_inicio_reserva" id="hora_inicio_reserva" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="hora_fin_reserva">Hora Fin</label>
                    <input type="time" name="hora_fin_reserva" id="hora_fin_reserva" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="estado_reserva">Estado</label>
                    <select name="estado_reserva" id="estado_reserva" class="form-control" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Confirmada">Confirmada</option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Finalizada">Finalizada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="motivo_reserva">Motivo</label>
                    <textarea name="motivo_reserva" id="motivo_reserva" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>