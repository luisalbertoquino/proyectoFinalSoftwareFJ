<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    public $table = "product";  

    public function category() //pasra asociar product con categoria
    {
        return $this->belongsTo('App\categoria','idCategoria','id');
    }

    public function medida() //pasra asociar venta con opcion de pago
    {
        return $this->belongsTo('App\metrica','idMetrica','id');
    }
    
}
