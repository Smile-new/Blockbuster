<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_UsuariosPlanes extends Model
{
    protected $table            = 'usuarios_planes';
    protected $primaryKey       = 'id_usuario_plan';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'fecha_registro_plan',
        'fecha_fin_plan',
        'id_usuario',
        'id_plan'
    ];



    public function get_usuarios_planes()
{
    return $this->db->table('usuarios_planes up')
        ->select('up.*, 
                  CONCAT(u.nombre_usuario, " ", u.ap_usuario, " ", u.am_usuario) AS nombre_usuario,
                  u.email_usuario AS correo_usuario,
                  p.nombre_plan,
                  p.precio_plan')
        ->join('usuarios u', 'u.id_usuario = up.id_usuario')
        ->join('planes p', 'p.id_plan = up.id_plan')
        ->get()
        ->getResultArray(); // Puedes usar ->getResult() si prefieres objetos
}

}
