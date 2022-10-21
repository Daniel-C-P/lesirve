<?php

namespace App\Models\Tenant;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Cliente
 *
 * @property $id
 * @property $telefono
 * @property $correo
 * @property $contrasenia
 * @property $nombre
 * @property $direccion
 * @property $suscrito
 *
 * @property CarroCompra[] $carroCompras
 * @property ReservaServicio[] $reservaServicios
 * @property VentasProducto[] $ventasProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Authenticatable
{
  public $timestamps = false;
    
    static $rules = [
		'telefono' => 'required|max:10',
		'correo' => 'required|max:80',
		'nombre' => 'required|max:45',
		'direccion' => 'required|max:45',
    'ciudad' => 'required|max:30'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'telefono',
        'correo',
        'contrasenia',
        'nombre',
        'direccion',
        'ciudad',
        'suscrito',
        'config',
    ];

    protected $hidden = [
      'contrasenia'
    ];

    public function getAuthPassword()
    {
      return $this->contrasenia;
    }
    
    protected $guard = 'cliente';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carroCompras()
    {
        return $this->hasMany(CarroCompra::class, 'id_cliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservaServicios()
    {
        return $this->hasMany('App\Models\ReservaServicio', 'id_cliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventasProductos()
    {
        return $this->hasMany('App\Models\VentasProducto', 'id_cliente', 'id');
    }
    
}
