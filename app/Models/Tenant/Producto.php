<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $id_categoria
 * @property $nombre
 * @property $descripcion_corta
 * @property $descripcion_larga
 * @property $imagen_1
 * @property $imagen_2
 * @property $imagen_3
 * @property $imagen_4
 * @property $en_oferta
 * @property $valor_descuento
 *
 * @property CarroCompra[] $carroCompras
 * @property Categoria $categoria
 * @property DetalleVentaProducto[] $detalleVentaProductos
 * @property EtiquetasProducto[] $etiquetasProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    static $rules = [
		'id_categoria' => 'required',
		'nombre' => 'required|max:30',
    'precio' => 'required',
		'descripcion_corta' => 'required',
		'imagen_1' => 'required',
		'valor_descuento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_categoria','nombre','precio','descripcion_corta','descripcion_larga','imagen_1','imagen_2','imagen_3','imagen_4','en_oferta','valor_descuento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carroCompras()
    {
        return $this->hasMany('App\Models\Tenant\CarroCompra', 'id_producto', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaProductos()
    {
        return $this->hasMany('App\Models\Tenant\DetalleVentaProducto', 'id_producto', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etiquetasProductos()
    {
        return $this->hasMany('App\Models\Tenant\EtiquetasProducto', 'id_producto', 'id');
    }


}
