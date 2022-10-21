<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuracione
 *
 * @property $id_plantilla
 * @property $nombre_tienda
 * @property $telefono
 * @property $direccion
 * @property $correo
 * @property $imagen_banner_1
 * @property $titulo_banner_1
 * @property $descripcion_banner_1
 * @property $imagen_banner_2
 * @property $titulo_banner_2
 * @property $descripcion_banner_2
 * @property $imagen_banner_3
 * @property $titulo_banner_3
 * @property $descripcion_banner_3
 * @property $facebook
 * @property $twitter
 * @property $whatsapp
 * @property $instagram
 * @property $youtube
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Configuracione extends Model
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
    protected $fillable = [
        'id_plantilla',
        'nombre_tienda',
        'nombre_tienda',
        'descripcion',
        'logo',
        'telefono',
        'direccion',
        'correo',
        'imagen_banner_1',
        'titulo_banner_1',
        'descripcion_banner_1',
        'imagen_banner_2',
        'titulo_banner_2',
        'descripcion_banner_2',
        'imagen_banner_3',
        'titulo_banner_3',
        'descripcion_banner_3',
        'facebook',
        'twitter',
        'whatsapp',
        'instagram',
        'youtube',
        'config',
        'color_p',
        'color_s',
    ];



}
