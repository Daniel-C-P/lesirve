<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasMenu
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $id_menu
 * @property $id_categoria
 *
 * @property Categoria $categoria
 * @property Menu $menu
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriasMenu extends Model
{
    
    static $rules = [
		'id_menu' => 'required',
		'id_categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_menu','id_categoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Tenant\Categoria', 'id', 'id_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu()
    {
        return $this->hasOne('App\Models\Tenant\Menu', 'id', 'id_menu');
    }
    

}
