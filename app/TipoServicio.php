<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descripcion
 * @property string $created_at
 * @property string $updated_at
 * @property Servicio[] $servicios
 */
class TipoServicio extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany('App\Servicio');
    }
}
