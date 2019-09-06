<?php

namespace App;
use App\Trago;
use App\Pedido;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = ['pedido_id','trago_id'];    

    public function tragos(){
        return $this->belongsToMany(Trago::class);
    }
}
