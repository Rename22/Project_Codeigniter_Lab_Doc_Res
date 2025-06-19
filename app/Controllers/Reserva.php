<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use CodeIgniter\Controller;

class Reserva extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new ReservaModel();
    }

    public function index()
    {
        try {
            $data = [
                'reservas' => $this->model->getAllReservas(),
                'title' => 'Listado de Reservas'
            ];
            
            return view('reserva/listReserva', $data);
        } catch (\Exception $e) {
            return view('errors/html/error_500', [
                'message' => 'Error al cargar las reservas: ' . $e->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);
            return redirect()->to('/reserva')->with('success', 'Reserva eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->to('/reserva')->with('error', 'Error al eliminar reserva: ' . $e->getMessage());
        }
    }
}
