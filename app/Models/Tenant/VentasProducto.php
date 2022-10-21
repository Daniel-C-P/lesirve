<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class VentasProducto extends Model
{
  static $rules = [
		'id_cliente' => 'required',
		'id_tipo_pago' => 'required',
		'id_estado_venta' => 'required',
		'id_estado_pago' => 'required',
		'total' => 'required',
		'telefono' => 'required',
		'ciudad' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_cliente',
      'id_tipo_pago',
      'id_estado_venta',
      'id_estado_pago',
      'total',
      'telefono',
      'ciudad',
      'direccion'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Tenant\Cliente', 'id', 'id_cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaProductos()
    {
        return $this->hasMany('App\Models\Tenant\DetalleVentaProducto', 'id_venta', 'id');
    }

    public function tiposPagos()
    {
      return $this->hasOne('App\Models\Tenant\TiposPago', 'id', 'id_tipo_pago');
    }
    public function estadosPagos()
    {
      return $this->hasOne('App\Models\Tenant\EstadosPago', 'id', 'id_estado_pago');
    }
    public function estadosVentas()
    {
      return $this->hasOne('App\Models\Tenant\EstadosVenta', 'id', 'id_estado_venta');
    }
}
