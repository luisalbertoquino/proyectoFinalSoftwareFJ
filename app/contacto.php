<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    public $table = "contacto";

    public function licencia() //pasra asociar licencia con cliente
    {
        return $this->belongsTo('App\licencia','idLicencia','id');

    }

    public function cliente() //pasra asociar licencia con cliente
    {
        return $this->belongsTo('App\User','idCliente','id');

    }

    public function responsable() //pasra asociar licencia con cliente
    {
        return $this->belongsTo('App\User','idResponsable','id');

    }
}
