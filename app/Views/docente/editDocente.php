<?php $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mt-5">Editar Docente</h1>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('docente/update/' . $docente['id_doc']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="cedula_doc">Cédula</label>
                            <input type="text" class="form-control" id="cedula_doc" name="cedula_doc" 
                                   value="<?= esc($docente['cedula_doc']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="primer_apellido_doc">Primer Apellido</label>
                            <input type="text" class="form-control" id="primer_apellido_doc" name="primer_apellido_doc" 
                                   value="<?= esc($docente['primer_apellido_doc']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="segundo_apellido_doc">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundo_apellido_doc" name="segundo_apellido_doc" 
                                   value="<?= esc($docente['segundo_apellido_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre_doc">Nombre</label>
                            <input type="text" class="form-control" id="nombre_doc" name="nombre_doc" 
                                   value="<?= esc($docente['nombre_doc']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="abreviatura_titulo_doc">Abreviatura Título</label>
                            <input type="text" class="form-control" id="abreviatura_titulo_doc" name="abreviatura_titulo_doc" 
                                   value="<?= esc($docente['abreviatura_titulo_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="fotografia_doc">Fotografía</label>
                            <?php if ($docente['fotografia_doc']): ?>
                                <img src="<?= esc($docente['fotografia_doc']) ?>" alt="Fotografía" class="img-thumbnail mb-2" style="max-width: 200px;">
                            <?php endif; ?>
                            <input type="file" class="form-control-file" id="fotografia_doc" name="fotografia_doc">
                        </div>

                        <div class="form-group">
                            <label for="perfil_profesional_doc">Perfil Profesional</label>
                            <textarea class="form-control" id="perfil_profesional_doc" name="perfil_profesional_doc" rows="3"><?= esc($docente['perfil_profesional_doc']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="telefono_doc">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono_doc" name="telefono_doc" 
                                   value="<?= esc($docente['telefono_doc']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email_doc">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email_doc" name="email_doc" 
                                   value="<?= esc($docente['email_doc']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="oficina_doc">Oficina</label>
                            <input type="text" class="form-control" id="oficina_doc" name="oficina_doc" 
                                   value="<?= esc($docente['oficina_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="facebook_doc">Facebook</label>
                            <input type="url" class="form-control" id="facebook_doc" name="facebook_doc" 
                                   value="<?= esc($docente['facebook_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="twitter_doc">Twitter</label>
                            <input type="url" class="form-control" id="twitter_doc" name="twitter_doc" 
                                   value="<?= esc($docente['twitter_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="pagina_web_doc">Página Web</label>
                            <input type="url" class="form-control" id="pagina_web_doc" name="pagina_web_doc" 
                                   value="<?= esc($docente['pagina_web_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="fk_id_car">ID Carrera</label>
                            <input type="number" class="form-control" id="fk_id_car" name="fk_id_car" 
                                   value="<?= esc($docente['fk_id_car']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="usuario_actualizacion_doc">Usuario Actualización</label>
                            <input type="text" class="form-control" id="usuario_actualizacion_doc" name="usuario_actualizacion_doc" 
                                   value="<?= esc($docente['usuario_actualizacion_doc']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="fk_id_usu">ID Usuario</label>
                            <input type="number" class="form-control" id="fk_id_usu" name="fk_id_usu" 
                                   value="<?= esc($docente['fk_id_usu']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="linkedin_doc">LinkedIn</label>
                            <input type="url" class="form-control" id="linkedin_doc" name="linkedin_doc" 
                                   value="<?= esc($docente['linkedin_doc']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="sexo_doc">Sexo</label>
                            <select class="form-control" id="sexo_doc" name="sexo_doc" required>
                                <option value="M" <?= $docente['sexo_doc'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                                <option value="F" <?= $docente['sexo_doc'] == 'F' ? 'selected' : '' ?>>Femenino</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('docente') ?>" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
