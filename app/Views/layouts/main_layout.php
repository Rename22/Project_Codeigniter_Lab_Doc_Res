<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorios</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- iziToast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Barra lateral izquierda -->
            <div class="col-md-2 bg-dark text-white p-4">
                <h3 class="text-center">Menú</h3>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('/') ?>">Laboratorios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('docente') ?>">Docentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('reserva') ?>">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('otros') ?>">Otro Listado</a>
                    </li>
                    <!-- Agregar más botones según sea necesario -->
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-10">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTables para todas las tablas con clase 'datatable'
            $('.datatable').DataTable({
                "scrollX": true,
                "responsive": true,
                "language": {
                    "sEmptyTable": "No hay datos disponibles en la tabla",
                    "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "sInfoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sLengthMenu": "Mostrar _MENU_ entradas",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sPrevious": "Anterior",
                        "sNext": "Siguiente",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>

    <!-- iziToast JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <script>
        // Manejar mensajes de sesión
        $(document).ready(function() {
            <?php if ($msg = session()->getFlashdata('success')): ?>
                iziToast.success({
                    title: 'Éxito',
                    message: "<?= $msg ?>",
                    position: 'topRight',
                    timeout: 3000,
                    progressBar: true
                });
            <?php endif; ?>

            <?php if ($err = session()->getFlashdata('error')): ?>
                iziToast.error({
                    title: 'Error',
                    message: "<?= $err ?>",
                    position: 'topRight',
                    timeout: 3000,
                    progressBar: true
                });
            <?php endif; ?>
        });
    </script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Funciones para mostrar mensajes -->
    <script>
        // Mostrar mensaje de éxito
        function showSuccess(message) {
            iziToast.success({
                title: 'Éxito',
                message: message,
                position: 'topRight',
                timeout: 3000,
                progressBar: true
            });
        }

        // Mostrar mensaje de error
        function showError(message) {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'topRight',
                timeout: 3000,
                progressBar: true
            });
        }

        // Mostrar mensaje de advertencia
        function showWarning(message) {
            iziToast.warning({
                title: 'Advertencia',
                message: message,
                position: 'topRight',
                timeout: 3000,
                progressBar: true
            });
        }

        // Mostrar mensaje de información
        function showInfo(message) {
            iziToast.info({
                title: 'Información',
                message: message,
                position: 'topRight',
                timeout: 3000,
                progressBar: true
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            <?php
                $toastType = session()->getFlashdata('toastType');
                $successMsg = session()->getFlashdata('success');
                $errorMsg   = session()->getFlashdata('error');
                if ($toastType):
            ?>
                const message = "<?= $successMsg ?? $errorMsg ?>";
                const type = "<?= $toastType ?>";
                
                switch(type) {
                    case 'success':
                        showSuccess(message);
                        break;
                    case 'error':
                        showError(message);
                        break;
                    case 'warning':
                        showWarning(message);
                        break;
                    case 'info':
                        showInfo(message);
                        break;
                    default:
                        showInfo(message);
                }
            <?php endif; ?>
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTable con las opciones necesarias y en español
            $('#laboratorioTable').DataTable({
                "scrollX": true,  // Habilitar desplazamiento horizontal
                "responsive": true,  // Hacer la tabla responsive
                "language": {
                    "sEmptyTable": "No hay datos disponibles en la tabla",
                    "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "sInfoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sLengthMenu": "Mostrar _MENU_ entradas",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sPrevious": "Anterior",
                        "sNext": "Siguiente",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
</body>
</html>
