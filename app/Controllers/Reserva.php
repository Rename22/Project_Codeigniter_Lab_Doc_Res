<?php

namespace App\Controllers;

use App\Models\ReservaModel;
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
        return view('reserva/addReserva');
    }

    public function store()
    {
        try {
            $data = [
                'fk_id_tipres'                  => $this->request->getPost('fk_id_tipres'),
                'fk_id_doc'                    => $this->request->getPost('fk_id_doc'),
                'fk_id_lab'                    => $this->request->getPost('fk_id_lab'),
                'fk_id_area'                   => $this->request->getPost('fk_id_area'),
                'fk_id_guia'                   => $this->request->getPost('fk_id_guia'),
                'tema_res'                     => $this->request->getPost('tema_res'),
                'comentario_res'               => $this->request->getPost('comentario_res'),
                'estado_res'                   => $this->request->getPost('estado_res'),
                'fecha_hora_res'               => $this->request->getPost('fecha_hora_res'),
                'duracion_res'                 => $this->request->getPost('duracion_res'),
                'numero_participantes_res'     => $this->request->getPost('numero_participantes_res'),
                'descripcion_participantes_res'=> $this->request->getPost('descripcion_participantes_res'),
                'materiales_res'               => $this->request->getPost('materiales_res'),
                'fecha_creacion_res'           => $this->request->getPost('fecha_creacion_res'),
                'fecha_actualizacion_res'      => $this->request->getPost('fecha_actualizacion_res'),
                'usuario_creacion_res'         => $this->request->getPost('usuario_creacion_res'),
                'usuario_actualizacion_res'    => $this->request->getPost('usuario_actualizacion_res'),
                'fecha_hora_fin_res'           => $this->request->getPost('fecha_hora_fin_res'),
                'observaciones_finales_res'    => $this->request->getPost('observaciones_finales_res'),
                'asistencia_res'               => $this->request->getPost('asistencia_res'),
                'guia_adjunta_res'             => $this->request->getPost('guia_adjunta_res'),
                'curso_res'                    => $this->request->getPost('curso_res'),
                'materia_res'                  => $this->request->getPost('materia_res'),
                'fk_id_car'                    => $this->request->getPost('fk_id_car'),
                'paralelo_res'                 => $this->request->getPost('paralelo_res'),
                'tipo_texto_res'               => $this->request->getPost('tipo_texto_res'),
                'fk_id_usu'                    => $this->request->getPost('fk_id_usu'),
                'software_res'                 => $this->request->getPost('software_res'),
                'tipo_res'                     => $this->request->getPost('tipo_res'),
                'pedidodocente_res'            => $this->request->getPost('pedidodocente_res'),
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

        return view('reserva/editReserva', ['reserva' => $reserva]);
    }

    public function update($id)
    {
        try {
            $data = [
                'fk_id_tipres'                  => $this->request->getPost('fk_id_tipres'),
                'fk_id_doc'                    => $this->request->getPost('fk_id_doc'),
                'fk_id_lab'                    => $this->request->getPost('fk_id_lab'),
                'fk_id_area'                   => $this->request->getPost('fk_id_area'),
                'fk_id_guia'                   => $this->request->getPost('fk_id_guia'),
                'tema_res'                     => $this->request->getPost('tema_res'),
                'comentario_res'               => $this->request->getPost('comentario_res'),
                'estado_res'                   => $this->request->getPost('estado_res'),
                'fecha_hora_res'               => $this->request->getPost('fecha_hora_res'),
                'duracion_res'                 => $this->request->getPost('duracion_res'),
                'numero_participantes_res'     => $this->request->getPost('numero_participantes_res'),
                'descripcion_participantes_res'=> $this->request->getPost('descripcion_participantes_res'),
                'materiales_res'               => $this->request->getPost('materiales_res'),
                'fecha_creacion_res'           => $this->request->getPost('fecha_creacion_res'),
                'fecha_actualizacion_res'      => $this->request->getPost('fecha_actualizacion_res'),
                'usuario_creacion_res'         => $this->request->getPost('usuario_creacion_res'),
                'usuario_actualizacion_res'    => $this->request->getPost('usuario_actualizacion_res'),
                'fecha_hora_fin_res'           => $this->request->getPost('fecha_hora_fin_res'),
                'observaciones_finales_res'    => $this->request->getPost('observaciones_finales_res'),
                'asistencia_res'               => $this->request->getPost('asistencia_res'),
                'guia_adjunta_res'             => $this->request->getPost('guia_adjunta_res'),
                'curso_res'                    => $this->request->getPost('curso_res'),
                'materia_res'                  => $this->request->getPost('materia_res'),
                'fk_id_car'                    => $this->request->getPost('fk_id_car'),
                'paralelo_res'                 => $this->request->getPost('paralelo_res'),
                'tipo_texto_res'               => $this->request->getPost('tipo_texto_res'),
                'fk_id_usu'                    => $this->request->getPost('fk_id_usu'),
                'software_res'                 => $this->request->getPost('software_res'),
                'tipo_res'                     => $this->request->getPost('tipo_res'),
                'pedidodocente_res'            => $this->request->getPost('pedidodocente_res'),
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
