<?php

namespace App\Models;

use CodeIgniter\Model;

class DocenteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'public.docente';
    protected $primaryKey       = 'id_doc';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cedula_doc',
        'primer_apellido_doc',
        'segundo_apellido_doc',
        'nombre_doc',
        'abreviatura_titulo_doc',
        'fotografia_doc',
        'perfil_profesional_doc',
        'telefono_doc',
        'email_doc',
        'oficina_doc',
        'facebook_doc',
        'twitter_doc',
        'pagina_web_doc',
        'fk_id_car',
        'fecha_creacion_doc',
        'fecha_actualizacion_doc',
        'usuario_creacion_doc',
        'usuario_actualizacion_doc',
        'fk_id_usu',
        'linkedin_doc',
        'sexo_doc'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion_doc';
    protected $updatedField  = 'fecha_actualizacion_doc';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
