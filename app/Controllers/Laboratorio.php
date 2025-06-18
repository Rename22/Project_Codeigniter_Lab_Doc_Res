<?php

namespace App\Controllers;

use App\Models\LaboratorioModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;

class Laboratorio extends Controller
{
    public function __construct()
    {
        // Inicializar la sesión
        helper('session');
    }
    public function index()
    {
        $model = new LaboratorioModel();
        $data['laboratorios'] = $model->findAll(); // Obtiene todos los registros de la tabla 'laboratorio'

        return view('laboratorio/listLaboratorio', $data); // Pasa los datos a la vista
    }

    /// Mostrar formulario para agregar laboratorio
    public function create()
    {
        return view('laboratorio/addLaboratorio');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $model = new LaboratorioModel();
        $laboratorio = $model->find($id);

        if (!$laboratorio) {
            return redirect()->back()->with('error', 'Laboratorio no encontrado');
        }

        return view('laboratorio/editLaboratorio', ['laboratorio' => $laboratorio]);
    }

    // Procesar la actualización del laboratorio
    public function update($id)
    {
        try {
            $model = new LaboratorioModel();
            $laboratorio = $model->find($id);

            if (!$laboratorio) {
                return redirect()->back()->with('error', 'Laboratorio no encontrado');
            }

            $data = [
                'nombre_lab' => $this->request->getPost('nombre_lab'),
                'descripcion_lab' => $this->request->getPost('descripcion_lab'),
                'tipo_lab' => $this->request->getPost('tipo_lab'),
                'ubicacion_lab' => $this->request->getPost('ubicacion_lab'),
                'color_lab' => $this->request->getPost('color_lab'),
                'siglas_lab' => $this->request->getPost('siglas_lab'),
                'paralelo_guia' => $this->request->getPost('paralelo_guia'),
                'facultad_lab' => $this->request->getPost('facultad_lab'),
                'fecha_actualizacion_lab' => date('Y-m-d H:i:s')
            ];

            if ($model->update($id, $data)) {
                return redirect()->to('/laboratorio')
                    ->with('success', 'Laboratorio actualizado correctamente');
            } else {
                $errors = $model->errors();
                return redirect()->back()
                    ->with('error', 'Hubo un problema al actualizar el laboratorio')
                    ->withInput()
                    ->with('validation', $errors);
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error inesperado: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Procesar la creación del laboratorio
    
    // Eliminar laboratorio
    public function delete($id)
    {
        try {
            $model = new LaboratorioModel();
            $laboratorio = $model->find($id);

            if (!$laboratorio) {
                return $this->response->setJSON(['success' => false, 'message' => 'Laboratorio no encontrado']);
            }

            if ($model->delete($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Laboratorio eliminado correctamente']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Error al eliminar el laboratorio']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }

    // Procesar la creación del laboratorio
    public function store()
    {
        try {
            // Obtener datos del formulario
            $data = [
                'nombre_lab' => $this->request->getPost('nombre_lab'),
                'descripcion_lab' => $this->request->getPost('descripcion_lab'),
                'tipo_lab' => $this->request->getPost('tipo_lab'),
                'ubicacion_lab' => $this->request->getPost('ubicacion_lab'),
                'color_lab' => $this->request->getPost('color_lab'),
                'siglas_lab' => $this->request->getPost('siglas_lab'),
                'paralelo_guia' => $this->request->getPost('paralelo_guia'),
                'facultad_lab' => $this->request->getPost('facultad_lab'),
                'fecha_creacion_lab' => date('Y-m-d H:i:s'),
                'fecha_actualizacion_lab' => date('Y-m-d H:i:s')
            ];

            // Crear una instancia del modelo
            $model = new LaboratorioModel();

            // Intentar insertar los datos en la base de datos
            if ($model->save($data)) {
                // Redirigir al listado de laboratorios
                return redirect()->to('/laboratorio')
                    ->with('success', 'Laboratorio agregado correctamente');
            } else {
                // Si hay errores de validación, mostrarlos
                $errors = $model->errors();
                return redirect()->back()
                    ->with('error', 'Hubo un problema al agregar el laboratorio')
                    ->withInput()
                    ->with('validation', $errors);
            }
        } catch (\Exception $e) {
            // Capturar cualquier otro error
            return redirect()->back()
                ->with('error', 'Error inesperado: ' . $e->getMessage())
                ->withInput();
        }
    }
}
