<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function tragos(){
        return $this->belongsToMany(Trago::class);
    }
}
