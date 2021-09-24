<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FacturaCompra extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Factura de Venta';
    public $compraOp;
    public $usuario;
    public $proveedor;
    public $compraFull;
    public $documento;
    public $config;
    public $image;
    public $image2;

    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($compraOp,$usuario,$proveedor,$compraFull,$documento,$config,$image,$image2)
    {
        $this->compraOp =$compraOp;
        $this->usuario =$usuario;
        $this->proveedor =$proveedor;
        $this->compraFull =$compraFull;
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
 
        return $this->view('Emails.correoCompra');
    }
}
