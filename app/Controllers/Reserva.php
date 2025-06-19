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
            // No cargamos todas las reservas para evitar problemas de memoria
            // El listado se obtendrá de forma asíncrona mediante DataTables
            $data = [
                'title' => 'Listado de Reservas'
            ];

            return view('reserva/listReserva', $data);
        } catch (\Exception $e) {
            return view('errors/html/error_500', [
                'message' => 'Error al cargar las reservas: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Endpoint para DataTables (server-side processing)
     */
    public function datatables()
    {
        $request = service('request');

        $start  = (int) $request->getGet('start');
        $length = (int) $request->getGet('length');
        $search = $request->getGet('search')['value'] ?? '';

        $builder = $this->model->builder();
        $builder->select('*');

        $totalRecords = $builder->countAll();

        if ($search !== '') {
            $builder->groupStart()
                ->like('tema_res', $search)
                ->orLike('comentario_res', $search)
                ->groupEnd();
        }

        $filteredRecords = $builder->countAllResults(false);

        $builder->orderBy('id_reserva', 'DESC');
        $builder->limit($length, $start);
        $data = $builder->get()->getResultArray();

        return $this->response->setJSON([
            'draw'            => intval($request->getGet('draw')), 
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data'            => $data,
        ]);
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
