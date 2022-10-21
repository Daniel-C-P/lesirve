<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVentaProducto
 *
 * @property $id
 * @property $id_producto
 * @property $id_venta
 * @property $precio
 * @property $cantidad
 *
 * @property Producto $producto
 * @property VentasProducto $ventasProducto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleVentaProducto extends Model
{
    public $timestamps = false;
    static $rules = [
		'id_producto' => 'required',
		'id_venta' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','id_venta','precio','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ventasProducto()
    {
        return $this->hasOne('App\Models\VentasProducto', 'id', 'id_venta');
    }


}
