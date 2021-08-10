<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table='pedidos';

    protected $fillable = [
        'total_monto',
        'pago',
    ];


    //Relacion uno a muchos
    public function linea_pedidos(){
        return $this->hasMany('App\Models\LineaPedido');
    }

    //Relacion uno a muchos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
