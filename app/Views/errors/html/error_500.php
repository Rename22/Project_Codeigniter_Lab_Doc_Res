<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500 - Error Interno del Servidor</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .error-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #dc3545;
            margin-top: 0;
        }
        .error-details {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .btn-home {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .btn-home:hover {
            background: #0069d9;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error 500 - Error Interno del Servidor</h1>
        <p>Lo sentimos, ha ocurrido un error inesperado al procesar tu solicitud.</p>
        
        <?php if (!empty($message)): ?>
            <div class="error-details">
                <p><strong>Detalles del error:</strong></p>
                <p><?= nl2br(esc($message)) ?></p>
            </div>
        <?php endif; ?>
        
        <p>Por favor intenta nuevamente más tarde o contacta al administrador del sistema.</p>
        
        <a href="<?= site_url('/') ?>" class="btn-home">
            <i class="fas fa-home"></i> Volver al inicio
        </a>
    </div>
</body>
</html>