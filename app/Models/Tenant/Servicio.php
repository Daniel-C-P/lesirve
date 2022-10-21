<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property HorarioServicio[] $horarioServicios
 * @property ReservaServicio[] $reservaServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'nombre' => ['required', 'unique:servicios'],
    'descripcion' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioServicios()
    {
        return $this->hasMany('App\Models\Tenant\HorarioServicio', 'id_servicio', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservaServicios()
    {
        return $this->hasMany('App\Models\Tenant\ReservaServicio', 'id_servicio', 'id');
    }
    

}
