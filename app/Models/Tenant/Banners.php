<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuracione
 *
 * @property $id
 * @property $id_configuracion
 * @property $titulo_imagen
 * @property $texto_boton
 * @property $URL_imagen
 * @property $URL_funcion
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Banners extends Model
{
    public $timestamps = false;
    static $rules = [
        '$URL_imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
     '$id',
     '$id_configuracion',
     '$titulo_imagen',
     '$texto_boton',
     '$URL_imagen',
     '$URL_funcion',
    ];



}
