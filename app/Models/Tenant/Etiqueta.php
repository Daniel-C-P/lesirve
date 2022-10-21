<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Etiqueta
 *
 * @property $id
 * @property $descripcion
 *
 * @property EtiquetasProducto[] $etiquetasProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Etiqueta extends Model
{
    public $timestamps = false;
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etiquetasProductos()
    {
        return $this->hasMany('App\Models\EtiquetasProducto', 'id_etiqueta', 'id');
    }


}
