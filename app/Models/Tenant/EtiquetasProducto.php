<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EtiquetasProducto
 *
 * @property $id
 * @property $id_producto
 * @property $id_etiqueta
 *
 * @property Etiqueta $etiqueta
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EtiquetasProducto extends Model
{
    public $timestamps = false;
    static $rules = [
		'id_producto' => 'required',
		'id_etiqueta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','id_etiqueta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function etiqueta()
    {
        return $this->hasOne('App\Models\Etiqueta', 'id', 'id_etiqueta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }


}
