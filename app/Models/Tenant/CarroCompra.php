<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarroCompra
 *
 * @property $id
 * @property $id_cliente
 * @property $id_producto
 *
 * @property Cliente $cliente
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CarroCompra extends Model
{
    public $timestamps = false;
    static $rules = [
		'id_cliente' => 'required',
		'id_producto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_producto', 'cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'id_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Tenant\Producto', 'id', 'id_producto');
    }


}
