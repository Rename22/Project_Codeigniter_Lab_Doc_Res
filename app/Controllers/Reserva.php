<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use CodeIgniter\Controller;

class Reserva extends Controller
{
    public function __construct()
    {
        helper('session');
    }

    public function index()
    {
        try {
            // Verificar si el modelo se puede instanciar
            $model = new ReservaModel();
            echo "<script>console.log('Modelo creado exitosamente');</script>";

            // Verificar si podemos obtener datos
            $data['reservas'] = $model->findAll();
            
            // Verificar si hay datos
            if (!empty($data['reservas'])) {
                echo "<script>console.log('Datos encontrados: ' + '" . json_encode($data['reservas']) . "');</script>";
            } else {
                echo "<script>console.log('No se encontraron datos en la tabla reservas');</script>";
            }
            
            // Verificar si la vista existe
            if (file_exists(APPPATH . 'Views/reserva/listReserva.php')) {
                echo "<script>console.log('Vista encontrada exitosamente');</script>";
                return view('reserva/listReserva', $data);
            } else {
                throw new \Exception('Vista no encontrada');
            }
        } catch (\Exception $e) {
            // Mostrar el error completo en la consola
            echo "<script>console.error('Error detallado: '" . $e->getMessage() . "');</script>";
            echo "<script>console.error('Trace: '" . $e->getTraceAsString() . "');</script>";
            
            // Mostrar el error en la página
            return view('errors/html/error_500', [
                'message' => $e->getMessage(),
                'exception' => $e
            ]);
        }
    }
}
