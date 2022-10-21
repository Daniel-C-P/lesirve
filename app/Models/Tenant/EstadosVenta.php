<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosVenta
 *
 * @property $id
 * @property $descripcion
 *
 * @property VentasProducto[] $ventasProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadosVenta extends Model
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
        return $this->hasMany('App\Models\VentasProducto', 'id_estado_venta', 'id');
    }
    

}
