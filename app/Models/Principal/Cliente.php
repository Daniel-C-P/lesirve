<?php

namespace App\Models\Principal;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\Syncable;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $usuario
 * @property $contrasenia
 * @property $correo
 * @property $telefono
 *
 * @property Tenant[] $tenants

 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model implements Syncable
{
    use ResourceSyncing;

    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'usuario' => 'required',
		'contrasenia' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'usuario',
        'contrasenia',
        'correo',
        'telefono',
        'config',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tenants()
    {
        return $this->hasMany('App\Models\Principal\Tenant', 'id_cliente', 'id');
    }
    public function carroCompras()
    {
        return $this->hasMany('App\Models\Tenant\CarroCompra', 'id_cliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservaServicios()
    {
        return $this->hasMany('App\Models\Tenant\ReservaServicio', 'id_cliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventasProductos()
    {
        return $this->hasMany('App\Models\Tenant\VentasProducto', 'id_cliente', 'id');
    }


    public function getGlobalIdentifierKey()
    {
      return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
      return 'correo';
    }

    public function getCentralModelName(): string
    {
      return CentralUser::class;
    }

    public function getSyncedAttributeNames(): array
    {
      return [
        'nombre',
        'contrasenia',
        'correo',
      ];
    }
}
