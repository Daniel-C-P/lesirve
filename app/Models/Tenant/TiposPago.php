<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposPago extends Model
{
    use HasFactory;
    protected $fillable = [
      'descripcion'
    ];
    public $timestamps = false;
}
