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
        $session = session();

        try {
            $db = \Config\Database::connect();
            $db->initialize();
            $model = new ReservaModel();
            $reservas = $model->findAll();
            log_message('info', 'Reservas obtenidas: ' . count($reservas));
            $session->setFlashdata([
                'success'   => 'Reservas obtenidas: ' . count($reservas),
                'toastType' => 'success',
            ]);
            return view('reserva/listReserva', ['reservas' => $reservas]);
        } catch (\Throwable $e) {
            log_message('error', 'Error al obtener las reservas: ' . $e->getMessage());
            $session->setFlashdata([
                'error'      => 'No se pudo conectar a la base de datos',
                'toastType'  => 'error',
                'debugError' => $e->getMessage(),
            ]);
            return view('reserva/listReserva', ['reservas' => []]);
        }
    }
}
