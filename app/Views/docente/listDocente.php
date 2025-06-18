<?php $this->extend('layouts/main_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mt-5">Lista de Docentes</h1>

<!-- Botón para agregar un nuevo docente -->
<div class="text-right mb-3">
    <a href="<?= base_url('docente/create'); ?>" class="btn btn-success">
        <i class="fas fa-plus"></i> Agregar Docente
    </a>
</div>

<!-- Tabla de Docentes -->
<div class="table-responsive">
    <table id="docenteTable" class="table table-striped table-bordered datatable" style="width:100%">
    <thead>
        <tr>
            <th>ID Doc</th>
            <th>Cédula Doc</th>
            <th>Primer Apellido Doc</th>
            <th>Segundo Apellido Doc</th>
            <th>Nombre Doc</th>
            <th>Abreviatura Título Doc</th>
            <th>Fotografía Doc</th>
            <th>Perfil Profesional Doc</th>
            <th>Teléfono Doc</th>
            <th>Email Doc</th>
            <th>Oficina Doc</th>
            <th>Facebook Doc</th>
            <th>Twitter Doc</th>
            <th>Página Web Doc</th>
            <th>FK ID Carrera</th>
            <th>Fecha Creación Doc</th>
            <th>Fecha Actualización Doc</th>
            <th>Usuario Creación Doc</th>
            <th>Usuario Actualización Doc</th>
            <th>FK ID Usuario</th>
            <th>LinkedIn Doc</th>
            <th>Sexo Doc</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($docentes as $docente): ?>
            <tr>
                <td><?= esc($docente['id_doc']) ?></td>
                <td><?= esc($docente['cedula_doc']) ?></td>
                <td><?= esc($docente['primer_apellido_doc']) ?></td>
                <td><?= esc($docente['segundo_apellido_doc']) ?></td>
                <td><?= esc($docente['nombre_doc']) ?></td>
                <td><?= esc($docente['abreviatura_titulo_doc']) ?></td>
                <td><?= esc($docente['fotografia_doc']) ?></td>
                <td><?= esc($docente['perfil_profesional_doc']) ?></td>
                <td><?= esc($docente['telefono_doc']) ?></td>
                <td><?= esc($docente['email_doc']) ?></td>
                <td><?= esc($docente['oficina_doc']) ?></td>
                <td><?= esc($docente['facebook_doc']) ?></td>
                <td><?= esc($docente['twitter_doc']) ?></td>
                <td><?= esc($docente['pagina_web_doc']) ?></td>
                <td><?= esc($docente['fk_id_car']) ?></td>
                <td><?= esc($docente['fecha_creacion_doc']) ?></td>
                <td><?= esc($docente['fecha_actualizacion_doc']) ?></td>
                <td><?= esc($docente['usuario_creacion_doc']) ?></td>
                <td><?= esc($docente['usuario_actualizacion_doc']) ?></td>
                <td><?= esc($docente['fk_id_usu']) ?></td>
                <td><?= esc($docente['linkedin_doc']) ?></td>
                <td><?= esc($docente['sexo_doc']) ?></td>
                <td>
                    <a href="<?= base_url('docente/edit/' . $docente['id_doc']) ?>" 
                       class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button type="button" 
                            class="btn btn-sm btn-danger ml-2 btn-delete" 
                            data-id="<?= $docente['id_doc'] ?>"
                            data-nombre="<?= esc($docente['nombre_doc'] . ' ' . $docente['primer_apellido_doc']) ?>">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<script>
    // Función para manejar la eliminación
    function handleDelete(e, id, nombre) {
        e.preventDefault();
        
        // Destruir cualquier instancia existente de iziToast
        if (iziToast.instances && iziToast.instances.length > 0) {
            iziToast.instances.forEach(instance => instance.destroy());
        }
        
        // Crear un nuevo mensaje de confirmación
        iziToast.question({
            title: 'Confirmación',
            message: '¿Estás seguro de eliminar el docente "' + nombre + '"?',
            position: 'center',
            timeout: 20000,
            overlay: true,
            displayMode: 'once',
            zindex: 999,
            layout: 2,
            buttons: [
                ['<button><b>Sí</b></button>', function (instance, toast) {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    // Realizar la eliminación
                    fetch(`/docente/delete/${id}`, {
                        method: 'DELETE'
                    })
                    .then(response => response.json())
                    .then(response => {
                        if (response.success) {
                            iziToast.success({
                                title: 'Éxito',
                                message: 'Docente eliminado correctamente',
                                position: 'topRight',
                                timeout: 3000
                            });
                            // Recargar la página
                            location.reload();
                        } else {
                            iziToast.error({
                                title: 'Error',
                                message: response.message,
                                position: 'topRight',
                                timeout: 3000
                            });
                        }
                    })
                    .catch(error => {
                        iziToast.error({
                            title: 'Error',
                            message: 'Error al eliminar el docente: ' + error,
                            position: 'topRight',
                            timeout: 3000
                        });
                    });
                }],
                ['<button>No</button>', function (instance, toast) {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                }]
            ],
            onClosing: function(instance, toast, closedBy) {
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
    }

    // Manejar los botones de eliminar usando delegación
    document.addEventListener('click', function(e) {
        // Verificar si el clic fue en un botón de eliminar
        if (e.target.classList.contains('btn-delete')) {
            // Obtener los datos del botón
            const id = e.target.dataset.id;
            const nombre = e.target.dataset.nombre;
            
            // Manejar la eliminación
            handleDelete(e, id, nombre);
        }
    });

    // Agregar un botón de prueba para ver el estado de la tabla
    try {
        const debugBtn = document.createElement('button');
        debugBtn.className = 'btn btn-info';
        debugBtn.id = 'debugBtn';
        debugBtn.textContent = 'Mostrar Estado';
        
        // Verificar si el contenedor existe antes de agregar
        const tableWrapper = document.querySelector('#docenteTable_wrapper');
        if (tableWrapper) {
            tableWrapper.appendChild(debugBtn);
        }

        debugBtn.addEventListener('click', function() {
            try {
                // Obtener la tabla usando JavaScript puro
                const table = document.querySelector('#docenteTable').DataTable();
                console.log('Estado de la tabla:');
                console.log('Total registros:', table.data().count());
                console.log('Registros visibles:', table.rows({ page: 'current' }).count());
                
                console.log('Buscando botones en todas las filas...');
                table.rows().every(function() {
                    const row = this.node();
                    const btnDelete = row.querySelector('.btn-delete');
                    console.log('Fila:', row.querySelector('td:first-child').textContent, 'Botón:', btnDelete ? 'Encontrado' : 'No encontrado');
                });
            } catch (error) {
                console.error('Error al obtener el estado de la tabla:', error);
            }
        });
    } catch (error) {
        console.error('Error al agregar el botón de prueba:', error);
    }

    // Manejar la reasignación de eventos cuando la tabla se redibuja
    // Usar JavaScript puro para la tabla
    const table = document.querySelector('#docenteTable').DataTable();
    table.on('draw.dt', function() {
        // Reasignar eventos a los botones nuevos
        document.querySelectorAll('.btn-delete').forEach(button => {
            // Verificar si ya tiene el evento antes de asignarlo
            const hasEvent = button.hasAttribute('data-event-bound');
            if (!hasEvent) {
                button.addEventListener('click', function(e) {
                    const id = this.dataset.id;
                    const nombre = this.dataset.nombre;
                    handleDelete(e, id, nombre);
                });
                button.setAttribute('data-event-bound', 'true');
            }
        });
    });
</script>

<?= $this->endSection(); ?>
