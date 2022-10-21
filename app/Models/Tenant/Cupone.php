<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cupone
 *
 * @property $id
 * @property $codigo
 * @property $fecha_creado
 * @property $estado
 * @property $valor
 * @property $tipo_cupon
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cupone extends Model
{
    public $timestamps = false;
    static $rules = [
		'codigo' => 'required',
		'estado' => 'required',
		'valor' => 'required',
		'tipo_cupon' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','fecha_creado','estado','valor','tipo_cupon'];



}
