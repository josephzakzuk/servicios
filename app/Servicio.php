<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $imagen
 * @property int $tipo_servicio_id
 * @property string $observaciones
 * @property string $created_at
 * @property string $updated_at
 * @property ServiciosCliente[] $serviciosClientes
 */
class Servicio extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nombre', 'imagen', 'tipo_servicio_id', 'observaciones', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviciosClientes()
    {
        return $this->hasMany('App\ServicioCliente');
    }
    public function tipoServicio()
    {
        return $this->belongsTo('App\TipoServicio','tipo_servicio_id');
    }
}
