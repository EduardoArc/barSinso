<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trago extends Model
{

    protected $fillable = ['name'];

    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }
}
