<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table='categorias';

    protected $fillable = [
        'nombre',
    ];

    //Relacion uno a muchos con pivote
    public function productos(){
        return $this->belongsToMany('App\Models\Producto','productos_categorias')
        ->withPivot('producto_id','nombre');
    }
}
