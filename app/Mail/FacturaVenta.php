<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FacturaVenta extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Factura de Venta';
    public $ventaOp;
    public $usuario;
    public $cliente;
    public $ventaFull;
    public $documento;
    public $config;
    public $image;
    public $image2;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ventaOp,$usuario,$cliente,$ventaFull,$documento,$config,$image,$image2)
    {
        $this->ventaOp =$ventaOp;
        $this->usuario =$usuario;
        $this->cliente =$cliente;
        $this->ventaFull =$ventaFull;
        $this->documento =$documento;
        $this->config =$config;
        $this->image =$image;
        $this->image2 =$image2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
 
        return $this->view('Emails.correoVenta');
    }
}
