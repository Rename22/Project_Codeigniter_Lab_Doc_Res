<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = '"reserva"';
    protected $schema = '"laboratorios"';
    
    // Esquema completo para PostgreSQL
    protected $fullTable = '"laboratorios"."reserva"';
    protected $primaryKey = 'id_reserva';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id_reserva',
        'fk_id_lab',
        'fk_id_doc',
        'fecha_reserva',
        'hora_inicio_reserva',
        'hora_fin_reserva',
        'estado_reserva',
        'motivo_reserva',
        'fecha_creacion_reserva',
        'fecha_actualizacion_reserva',
        'usuario_creacion_reserva',
        'usuario_actualizacion_reserva',
        'fk_id_usu'
    ];

    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        try {
            parent::__construct();
            $this->db = \Config\Database::connect('default');
            
            // Verificar conexión
            if ($this->db->connID) {
                echo "<script>console.log('Conexión a la base de datos exitosa');</script>";
                
                // Verificar si el esquema existe
                $query = $this->db->query("SELECT schema_name FROM information_schema.schemata WHERE schema_name = '" . $this->schema . "'" );
                if ($query->getNumRows() > 0) {
                    echo "<script>console.log('Esquema " . $this->schema . " encontrado');</script>";
                    
                    // Verificar si la tabla existe en el esquema
                    $query = $this->db->query("SELECT table_name FROM information_schema.tables WHERE table_schema = '" . $this->schema . "' AND table_name = '" . $this->table . "'" );
                    if ($query->getNumRows() > 0) {
                        echo "<script>console.log('Tabla " . $this->table . " encontrada en el esquema " . $this->schema . "');</script>";
                        
                        // Verificar la estructura de la tabla
                        $query = $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_schema = '" . $this->schema . "' AND table_name = '" . $this->table . "'" );
                        $columns = $query->getResultArray();
                        echo "<script>console.log('Columnas de la tabla: ' + JSON.stringify(" . json_encode($columns) . "));</script>";
                        
                        // Verificar si podemos consultar la tabla
                        $query = $this->db->query("SELECT * FROM " . $this->fullTable . " LIMIT 1");
                        if ($query) {
                            echo "<script>console.log('Consulta de prueba exitosa a la tabla');</script>";
                        } else {
                            echo "<script>console.error('Error en la consulta de prueba a la tabla');</script>";
                            throw new \Exception('Error en la consulta de prueba');
                        }
                    } else {
                        echo "<script>console.error('Tabla " . $this->table . " no encontrada en el esquema " . $this->schema . "');</script>";
                        throw new \Exception('Tabla no encontrada en el esquema');
                    }
                } else {
                    echo "<script>console.error('Esquema " . $this->schema . " no encontrado');</script>";
                    throw new \Exception('Esquema no encontrado');
                }
            } else {
                echo "<script>console.error('Error de conexión a la base de datos');</script>";
                throw new \Exception('Error de conexión');
            }
        } catch (\Exception $e) {
            echo "<script>console.error('Error en el modelo: '" . $e->getMessage() . "');</script>";
            throw $e;
        }
    }

    public function findAll(?int $limit = null, int $offset = 0)
    {
        try {
            // Usar el esquema completo
            $builder = $this->db->table($this->fullTable);
            
            if ($limit !== null) {
                $builder->limit($limit, $offset);
            }
            
            $query = $builder->get();
            
            if ($query) {
                echo "<script>console.log('Consulta exitosa a la tabla de reservas');</script>";
                return $query->getResultArray();
            } else {
                echo "<script>console.error('Error en la consulta a la tabla de reservas');</script>";
                return [];
            }
        } catch (\Exception $e) {
            echo "<script>console.error('Error en la consulta: '" . $e->getMessage() . "');</script>";
            return [];
        }
    }
}
