<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = "productos";
    protected $fillable = ['nombre', 'descripcion', 'precio','proveedor_id','fecha_registro'];

	public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

}
