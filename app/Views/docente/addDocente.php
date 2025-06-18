<?php $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mt-5">Agregar Docente</h1>

<div class="container mt-4">
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
    
    <?php if (session()->has('validation')): ?>
        <div class="alert alert-danger">
            <?php foreach (session('validation') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="row justify-content-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('docente/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="cedula_doc">Cédula</label>
                            <input type="text" class="form-control" id="cedula_doc" name="cedula_doc" required>
                        </div>

                        <div class="form-group">
                            <label for="primer_apellido_doc">Primer Apellido</label>
                            <input type="text" class="form-control" id="primer_apellido_doc" name="primer_apellido_doc" required>
                        </div>

                        <div class="form-group">
                            <label for="segundo_apellido_doc">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundo_apellido_doc" name="segundo_apellido_doc">
                        </div>

                        <div class="form-group">
                            <label for="nombre_doc">Nombre</label>
                            <input type="text" class="form-control" id="nombre_doc" name="nombre_doc" required>
                        </div>

                        <div class="form-group">
                            <label for="abreviatura_titulo_doc">Abreviatura Título</label>
                            <input type="text" class="form-control" id="abreviatura_titulo_doc" name="abreviatura_titulo_doc">
                        </div>

                        <div class="form-group">
                            <label for="fotografia_doc">Fotografía</label>
                            <input type="file" class="form-control-file" id="fotografia_doc" name="fotografia_doc">
                        </div>

                        <div class="form-group">
                            <label for="perfil_profesional_doc">Perfil Profesional</label>
                            <textarea class="form-control" id="perfil_profesional_doc" name="perfil_profesional_doc" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="telefono_doc">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono_doc" name="telefono_doc">
                        </div>

                        <div class="form-group">
                            <label for="email_doc">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email_doc" name="email_doc" required>
                        </div>

                        <div class="form-group">
                            <label for="oficina_doc">Oficina</label>
                            <input type="text" class="form-control" id="oficina_doc" name="oficina_doc">
                        </div>

                        <div class="form-group">
                            <label for="facebook_doc">Facebook</label>
                            <input type="url" class="form-control" id="facebook_doc" name="facebook_doc">
                        </div>

                        <div class="form-group">
                            <label for="twitter_doc">Twitter</label>
                            <input type="url" class="form-control" id="twitter_doc" name="twitter_doc">
                        </div>

                        <div class="form-group">
                            <label for="pagina_web_doc">Página Web</label>
                            <input type="url" class="form-control" id="pagina_web_doc" name="pagina_web_doc">
                        </div>

                        <div class="form-group">
                            <label for="fk_id_car">ID Carrera</label>
                            <input type="number" class="form-control" id="fk_id_car" name="fk_id_car" required>
                        </div>

                        <div class="form-group">
                            <label for="usuario_creacion_doc">Usuario Creación</label>
                            <input type="text" class="form-control" id="usuario_creacion_doc" name="usuario_creacion_doc" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_id_usu">ID Usuario</label>
                            <input type="number" class="form-control" id="fk_id_usu" name="fk_id_usu" >
                        </div>

                        <div class="form-group">
                            <label for="linkedin_doc">LinkedIn</label>
                            <input type="url" class="form-control" id="linkedin_doc" name="linkedin_doc">
                        </div>

                        <div class="form-group">
                            <label for="sexo_doc">Sexo</label>
                            <select class="form-control" id="sexo_doc" name="sexo_doc" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('docente') ?>" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
