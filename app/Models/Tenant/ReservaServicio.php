<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReservaServicio
 *
 * @property $id
 * @property $id_cliente
 * @property $id_servicio
 * @property $dia
 * @property $hora
 *
 * @property Cliente $cliente
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReservaServicio extends Model
{
    public $timestamps = false;
    static $rules = [
		'id_cliente' => 'required',
		'id_servicio' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_servicio','fecha','hora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Tenant\Cliente', 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Tenant\Servicio', 'id', 'id_servicio');
    }


}
