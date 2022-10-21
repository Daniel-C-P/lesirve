<?php

namespace App\Models\Principal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Stancl\Tenancy\Contracts\SyncMaster;
use Stancl\Tenancy\Database\Concerns\CentralConnection;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;
use Stancl\Tenancy\Database\Models\TenantPivot;

class CentralUser extends Model implements SyncMaster
{
    use ResourceSyncing, CentralConnection;
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'clientes';
    static $rules = [
      'nombre' => 'required',
      'usuario' => 'required',
      'contrasenia' => 'required',
      'correo' => 'required',
      'telefono' => 'required',
      ];

    public function tenants(): BelongsToMany
    {
      return $this->belongsToMany(Tenant::class, 'tenant_users', 'global_user_id', 'tenant_id', 'correo')
        ->using(TenantPivot::class);
    }

    public function getTenantModelName(): string
    {
      return Cliente::class;
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
      return static::class;
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
