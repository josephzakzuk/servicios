<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $cedula
 * @property string $nombre
 * @property string $correo
 * @property string $telefono
 * @property string $direccion
 * @property string $observaciones
 * @property string $created_at
 * @property string $updated_at
 * @property ServiciosCliente[] $serviciosClientes
 */
class Cliente extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cedula', 'nombre', 'correo', 'telefono', 'direccion', 'imagen', 'observaciones', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviciosClientes()
    {
        return $this->hasMany('App\ServicioCliente');
    }
}
