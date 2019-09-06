<?php

namespace App;
use App\Pedido;

use Illuminate\Database\Eloquent\Model;

class Trago extends Model
{

    protected $fillable = ['name','description','price'];
   

    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }
}
