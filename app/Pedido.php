<?php

namespace App;
use App\Trago;
use App\Pedido;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = ['user_id','trago_id'];   
    
    //relacion muchos a uno 
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tragos(){
        return $this->belongsToMany(Trago::class);
    }
}
