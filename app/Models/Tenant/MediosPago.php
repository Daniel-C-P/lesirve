<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MediosPago
 *
 * @property $id
 * @property $nombre
 * @property $logo
 * @property $habilitado
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MediosPago extends Model
{
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'logo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','logo','habilitado','cuenta','tipo_cuenta'];

}
