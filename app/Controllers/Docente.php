<?php

namespace App\Controllers;

use App\Models\DocenteModel;
use CodeIgniter\Controller;

class Docente extends Controller
{
    public function __construct()
    {
        helper('session');
    }

    public function index()
    {
        $model = new DocenteModel();
        $data['docentes'] = $model->findAll();
        return view('docente/listDocente', $data);
    }

    public function create()
    {
        return view('docente/addDocente');
    }

    public function store()
    {
        try {
            $model = new DocenteModel();
            $data = [
                'cedula_doc' => $this->request->getPost('cedula_doc'),
                'primer_apellido_doc' => $this->request->getPost('primer_apellido_doc'),
                'segundo_apellido_doc' => $this->request->getPost('segundo_apellido_doc'),
                'nombre_doc' => $this->request->getPost('nombre_doc'),
                'abreviatura_titulo_doc' => $this->request->getPost('abreviatura_titulo_doc'),
                'fotografia_doc' => $this->request->getPost('fotografia_doc'),
                'perfil_profesional_doc' => $this->request->getPost('perfil_profesional_doc'),
                'telefono_doc' => $this->request->getPost('telefono_doc'),
                'email_doc' => $this->request->getPost('email_doc'),
                'oficina_doc' => $this->request->getPost('oficina_doc'),
                'facebook_doc' => $this->request->getPost('facebook_doc'),
                'twitter_doc' => $this->request->getPost('twitter_doc'),
                'pagina_web_doc' => $this->request->getPost('pagina_web_doc'),
                'fk_id_car' => $this->request->getPost('fk_id_car'),
                'fecha_creacion_doc' => date('Y-m-d H:i:s'),
                'fecha_actualizacion_doc' => date('Y-m-d H:i:s'),
                'usuario_creacion_doc' => $this->request->getPost('usuario_creacion_doc'),
                'usuario_actualizacion_doc' => $this->request->getPost('usuario_actualizacion_doc'),
                'fk_id_usu' => $this->request->getPost('fk_id_usu'),
                'linkedin_doc' => $this->request->getPost('linkedin_doc'),
                'sexo_doc' => $this->request->getPost('sexo_doc')
            ];

            if ($model->save($data)) {
                return redirect()->to('/docente')
                    ->with('success', 'Docente agregado correctamente');
            } else {
                return redirect()->back()
                    ->with('error', 'Hubo un problema al agregar el docente')
                    ->withInput()
                    ->with('validation', $model->errors());
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error inesperado: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $model = new DocenteModel();
        $docente = $model->find($id);

        if (!$docente) {
            return redirect()->back()->with('error', 'Docente no encontrado');
        }

        return view('docente/editDocente', ['docente' => $docente]);
    }

    public function update($id)
    {
        try {
            $model = new DocenteModel();
            $docente = $model->find($id);

            if (!$docente) {
                return redirect()->back()->with('error', 'Docente no encontrado');
            }

            $data = [
                'cedula_doc' => $this->request->getPost('cedula_doc'),
                'primer_apellido_doc' => $this->request->getPost('primer_apellido_doc'),
                'segundo_apellido_doc' => $this->request->getPost('segundo_apellido_doc'),
                'nombre_doc' => $this->request->getPost('nombre_doc'),
                'abreviatura_titulo_doc' => $this->request->getPost('abreviatura_titulo_doc'),
                'fotografia_doc' => $this->request->getPost('fotografia_doc'),
                'perfil_profesional_doc' => $this->request->getPost('perfil_profesional_doc'),
                'telefono_doc' => $this->request->getPost('telefono_doc'),
                'email_doc' => $this->request->getPost('email_doc'),
                'oficina_doc' => $this->request->getPost('oficina_doc'),
                'facebook_doc' => $this->request->getPost('facebook_doc'),
                'twitter_doc' => $this->request->getPost('twitter_doc'),
                'pagina_web_doc' => $this->request->getPost('pagina_web_doc'),
                'fk_id_car' => $this->request->getPost('fk_id_car'),
                'fecha_actualizacion_doc' => date('Y-m-d H:i:s'),
                'usuario_actualizacion_doc' => $this->request->getPost('usuario_actualizacion_doc'),
                'fk_id_usu' => $this->request->getPost('fk_id_usu'),
                'linkedin_doc' => $this->request->getPost('linkedin_doc'),
                'sexo_doc' => $this->request->getPost('sexo_doc')
            ];

            if ($model->update($id, $data)) {
                return redirect()->to('/docente')
                    ->with('success', 'Docente actualizado correctamente');
            } else {
                return redirect()->back()
                    ->with('error', 'Hubo un problema al actualizar el docente')
                    ->withInput()
                    ->with('validation', $model->errors());
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error inesperado: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $model = new DocenteModel();
            $docente = $model->find($id);

            if (!$docente) {
                return $this->response->setJSON(['success' => false, 'message' => 'Docente no encontrado']);
            }

            if ($model->delete($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Docente eliminado correctamente']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Error al eliminar el docente']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }
}
