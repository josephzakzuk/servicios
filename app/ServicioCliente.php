<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cliente_id
 * @property int $servicio_id
 * @property int $orden
 * @property int $fecha_inicio
 * @property int $fecha_fin
 * @property string $created_at
 * @property string $updated_at
 * @property Servicio $servicio
 * @property Cliente $cliente
 */
class ServicioCliente extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'servicios_clientes';

    /**
     * @var array
     */
    protected $fillable = ['cliente_id', 'servicio_id', 'orden', 'fecha_inicio', 'fecha_fin', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
