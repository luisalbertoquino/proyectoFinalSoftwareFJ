<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opcionDePago extends Model
{
    public $table = "opcion_de_pago";
    public function op() //pasra asociar venta con opcion de pago
    {
        return $this->belongsTo('App\opcionDePago','idOp','id');
    }
}
