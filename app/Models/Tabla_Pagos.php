<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_Pagos extends Model
{
    protected $table            = 'pagos';
    protected $primaryKey       = 'id_pago';
    protected $allowedFields    = [
        'fecha_registro_pago',
        'estatus_pago',
        'monto_pago',
        'tarjeta_pago',
        'id_usuario',
        'id_plan'
    ];
    protected $returnType       = 'object'; // Asegura que devuelva objetos

    public function getWithRelations()
    {
        return $this->select('
                pagos.*,
                usuarios.nombre_usuario,
                usuarios.ap_usuario,
                usuarios.am_usuario,
                planes.nombre_plan,
                planes.precio_plan
            ')
            ->join('usuarios', 'usuarios.id_usuario = pagos.id_usuario')
            ->join('planes', 'planes.id_plan = pagos.id_plan')
            ->findAll();
    }
}
