<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">

    <style>


        /*marca de agua css*/
        /** 
            * Set the margins of the PDF to 0
            * so the background image will cover the entire page.
            **/
            

            /** 
            * Define the width, height, margins and position of the watermark.
            **/
            #watermark
                    {
                    position:fixed;
                    bottom:15cm;
                    left:5.5cm;
                    right:5px;
                    opacity:0.5;
                    z-index:99;
                    width:20cm;
                    height:17cm;
                    color:white;
                    }
            
        </style>
</head><body>
    <?php
            $fecha = date('Y-m-d');
            $acum = 0;
            $pinaculo=0;
            foreach ($ventaFull as $ventaFull) {
               $pinaculo=$ventaFull->numeroVenta;
            }
            if ($pinaculo ==0) {
            $acum = $acum+1;
            } else {
            $acum = $venta->numeroVenta;
            } 
    ?>


        <div id="watermark" >
            <img src="{{$config->nombreLogo}}" style="opacity: 0.5;" height="100%" width="100%"/>
        </div>
                <div class="card"> 
                    <div class="container">
                        <div class="invoice-box"> 
                            <div class="table-responsive">
                                <table class="table" id="tablita" cellpadding="0" cellspacing="0" style="background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url({{$config->nombreLogo}}); background-repeat: no-repeat;">
                                    
                                    <tr class="top">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td class="title">
                                                        <img  src="{{$config->logo}}" style="width:100px; max-width:300px;" alt="Si Hay logo">
                                                    </td>
                                            
                                                    <td>
                                                        Factura de venta#  :{{$acum }}<br>
                                                        Fecha Atual: <?php echo date("Y-m-d");?><br>
                                                        Fecha Venta: <?php echo date("Y-m-d");?> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr class="information">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <!---datos empresa general-->
                                                    <td>
                                                        {{$config->nombreEmpresa}}<br>
                                                        Nit. {{$config->nit}}<br>
                                                        tel. {{$config->telefono}}
                                                    </td>
                                                    <!---datos contacto-->
                                                    <td>
                                                        {{$config->razonSocial}}<br>
                                                        Webside:{{$config->paginaWeb}}<br>
                                                        {{$config->email}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr class="heading">
                                        <td>
                                            Datos Cliente
                                        </td>
                
                                        <td>
                                            Vendedor
                                        </td>
                                        
                                        
                                    </tr>
                                    
                                    <tr class="details">
                                        <td>
                                            <label id="clienter" type="text"></label><br>
                
                
                                            Tipo Documento:Cedula de ciudadania <br>
                
                                            # Documento:1075389698<br>
                                        </td>
                                        
                                        <td>
                                            {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}
                
                                        </td> 
                                    </tr>
                
                                    <tr class="heading">
                                        <td>
                                            Producto/Cantidad
                                        </td>
                                        <td>
                                            Total $$
                                        </td>
                                    </tr>
                                    
                                   
                                    <tr class="item">
                                        <td>
                                            Descontinuado
                                            Verduras
                                            Trigo
                                            Maicena
                                        </td>
                                            
                                        <td>
                                            20000.00 $$
                                            20000.00 $$
                                            20000.00 $$
                                            20000.00 $$
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td></td>
                                        <td>
                                            SubTotal:.00 $$<br>
                                            Total Impuestos: <br>
                                            Descuentos Adicionales:.00 $$ <br>
                                           Total:.00 $$
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
</body></html>