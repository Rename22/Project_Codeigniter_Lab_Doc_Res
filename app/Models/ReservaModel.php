<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'laboratorios.reserva';
    protected $primaryKey = 'id_reserva';
    protected $allowedFields = [
        'fk_id_lab',
        'fk_id_doc',
        'fecha_reserva',
        'hora_inicio_reserva',
        'hora_fin_reserva',
        'estado_reserva',
        'motivo_reserva',
    ];

    public function getAllReservas()
    {
        return $this->findAll();
    }
}