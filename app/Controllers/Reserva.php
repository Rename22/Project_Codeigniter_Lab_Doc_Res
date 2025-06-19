<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use App\Models\LaboratorioModel;
use App\Models\DocenteModel;
use CodeIgniter\Controller;

class Reserva extends Controller
{
    protected $model;

    public function __construct()
    {
        helper('session');
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

    public function create()
    {
        $laboratorioModel = new LaboratorioModel();
        $docenteModel     = new DocenteModel();

        $data = [
            'laboratorios' => $laboratorioModel->findAll(),
            'docentes'     => $docenteModel->findAll(),
        ];

        return view('reserva/addReserva', $data);
    }

    public function store()
    {
        try {
            $data = [
                'fk_id_lab'          => $this->request->getPost('fk_id_lab'),
                'fk_id_doc'          => $this->request->getPost('fk_id_doc'),
                'fecha_reserva'      => $this->request->getPost('fecha_reserva'),
                'hora_inicio_reserva'=> $this->request->getPost('hora_inicio_reserva'),
                'hora_fin_reserva'   => $this->request->getPost('hora_fin_reserva'),
                'estado_reserva'     => $this->request->getPost('estado_reserva'),
                'motivo_reserva'     => $this->request->getPost('motivo_reserva'),
            ];

            if ($this->model->save($data)) {
                return redirect()->to('/reserva')->with('success', 'Reserva agregada correctamente');
            }

            return redirect()->back()
                ->with('error', 'Hubo un problema al agregar la reserva')
                ->withInput()
                ->with('errors', $this->model->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error inesperado: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $reserva = $this->model->find($id);

        if (!$reserva) {
            return redirect()->back()->with('error', 'Reserva no encontrada');
        }

        $laboratorioModel = new LaboratorioModel();
        $docenteModel     = new DocenteModel();

        $data = [
            'reserva'      => $reserva,
            'laboratorios' => $laboratorioModel->findAll(),
            'docentes'     => $docenteModel->findAll(),
        ];

        return view('reserva/editReserva', $data);
    }

    public function update($id)
    {
        try {
            $data = [
                'fk_id_lab'          => $this->request->getPost('fk_id_lab'),
                'fk_id_doc'          => $this->request->getPost('fk_id_doc'),
                'fecha_reserva'      => $this->request->getPost('fecha_reserva'),
                'hora_inicio_reserva'=> $this->request->getPost('hora_inicio_reserva'),
                'hora_fin_reserva'   => $this->request->getPost('hora_fin_reserva'),
                'estado_reserva'     => $this->request->getPost('estado_reserva'),
                'motivo_reserva'     => $this->request->getPost('motivo_reserva'),
            ];

            if ($this->model->update($id, $data)) {
                return redirect()->to('/reserva')->with('success', 'Reserva actualizada correctamente');
            }

            return redirect()->back()
                ->with('error', 'Hubo un problema al actualizar la reserva')
                ->withInput()
                ->with('errors', $this->model->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error inesperado: ' . $e->getMessage())->withInput();
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
