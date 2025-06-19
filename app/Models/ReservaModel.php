<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table      = 'laboratorios.reserva';
    protected $primaryKey = 'id_res';
    protected $allowedFields = [
        'fk_id_tipres',
        'fk_id_doc',
        'fk_id_lab',
        'fk_id_area',
        'fk_id_guia',
        'tema_res',
        'comentario_res',
        'estado_res',
        'fecha_hora_res',
        'duracion_res',
        'numero_participantes_res',
        'descripcion_participantes_res',
        'materiales_res',
        'fecha_creacion_res',
        'fecha_actualizacion_res',
        'usuario_creacion_res',
        'usuario_actualizacion_res',
        'fecha_hora_fin_res',
        'observaciones_finales_res',
        'asistencia_res',
        'guia_adjunta_res',
        'curso_res',
        'materia_res',
        'fk_id_car',
        'paralelo_res',
        'tipo_texto_res',
        'fk_id_usu',
        'software_res',
        'tipo_res',
        'pedidodocente_res',
    ];

    public function getAllReservas()
    {
        return $this->findAll();
    }
}
