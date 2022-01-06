<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    use HasFactory;


    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }



    public function roles($id_role)
    {

        $roles = EmpleadoRol::select("roles.nombre as rol_nombre", "roles.id as role_id")
            ->join("roles", "empleado_rol.rol_id", "=", "roles.id")
            ->where('empleado_rol.empleado_id', $this->id)
            ->where('empleado_rol.rol_id', $id_role)->count();

        return $roles;
    }
}
