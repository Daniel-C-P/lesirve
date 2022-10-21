<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HorarioServicio
 *
 * @property $id
 * @property $dia
 * @property $id_servicio
 * @property $hora_inicio
 * @property $hora_fin
 * @property $habilitado
 *
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HorarioServicio extends Model
{
    public $timestamps = false;
    static $rules = [
		'dia' => 'required',
		'id_servicio' => 'required',
		'hora_inicio' => 'required',
		'hora_fin' => 'required',
		'habilitado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dia','id_servicio','hora_inicio','hora_fin','habilitado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'id_servicio');
    }


}
