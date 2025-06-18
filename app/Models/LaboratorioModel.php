<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratorioModel extends Model
{
    protected $table = 'laboratorios.laboratorio';
    protected $primaryKey = 'id_lab';
    protected $allowedFields = [
        'nombre_lab',
        'descripcion_lab',
        'tipo_lab',
        'ubicacion_lab',
        'color_lab',
        'siglas_lab',
        'paralelo_guia',
        'facultad_lab'
    ];
    // Desactivar el uso de timestamps automático
    protected $useTimestamps = false;
    
    // Configurar los campos de fecha manualmente
    protected $createdField  = 'fecha_creacion_lab';
    protected $updatedField  = 'fecha_actualizacion_lab';
}
