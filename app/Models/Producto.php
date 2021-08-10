<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table='productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'flag',
        'unidad',
    ];

    //Relacion muchos a muchos
    public function categorias(){
        return $this->belongsToMany('App\Models\Categoria');
    }

    //Relacion uno a muchos
    public function linea_pedido(){
        return $this->belongsTo('App\Models\LineaPedido');
    }
}
