<?php

namespace App\Models\Principal;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Domain
 *
 * @property $id
 * @property $domain
 * @property $tenant_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Tenant $tenant
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Domain extends Model
{

    static $rules = [
		'domain' => 'required',
		'tenant_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['domain','tenant_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tenant()
    {
        return $this->hasOne('App\Models\Principal\Tenant', 'id', 'tenant_id');
    }

    public function cliente()
    {
        return $this->hasOne('App\Models\Principal\Cliente', 'id', 'cliente_id');
    }


}
