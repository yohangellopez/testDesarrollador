<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;

    protected $table='linea_pedidos';


    //relacion uno a muchos
    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

     //Relacion uno a muchos
     public function productos(){
        return $this->hasMany('App\Models\Productos');
    }
}
