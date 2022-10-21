<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $nombre
 *
 * @property CategoriasMenu[] $categoriasMenuses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Menu extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'url', 'visible'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriasMenus()
    {
        return $this->hasMany('App\Models\Tenant\CategoriasMenu', 'id_menu', 'id');
    }
    
    public function categorias()
    {
      return $this->belongsToMany('App\Models\Tenant\Categoria', 'App\Models\Tenant\CategoriasMenu', 'id_menu', 'id_categoria', 'id', 'id');
    }
}
