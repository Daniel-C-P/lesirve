<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosPago
 *
 * @property $id
 * @property $descripcion
 *
 * @property VentasProducto[] $ventasProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadosPago extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion'];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventasProductos()
    {
        return $this->hasMany('App\Models\Tenant\VentasProducto', 'id_estado_pago', 'id');
    }
    

}
