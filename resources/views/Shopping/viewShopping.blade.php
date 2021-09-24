@extends('adminlte::page')

    @section('title', 'Ver Compra')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/home">Home</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="/config">Ajustes</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="/roles">Roles Registrados</a>
            </li>
            <li class="breadcrumb-item active">Mostrar Rol</li>
          </ol>
  
          <div class="card card-login2 mx-auto mt-2" style="border:1px solid #666"> 
              <div class="card-header" style="text-align: left">
                  <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
              </div>
              <div class="card-body">
  
                  <!--mensajes de error-->
                  @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                      <ul >
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul> 
                  </div>
                  @endif
  
  
                  <div class="card">
                      <div class="container">
                          <div class="invoice-box"> 
                              
                              <div class="table-responsive">
                                  <table class="table" id="tablita" cellpadding="0" cellspacing="0" style="background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5)), url({{{$config->nombreLogo}}}); background-repeat: no-repeat;">
                                      
                                      <tr class="top">
                                          <td colspan="2">
                                              <table>
                                                  <tr>
                                                      <td class="title">
                                                          <img  src="{{$config->logo}}" style="width:100px; max-width:300px;">
                                                      </td>
                                              
                                                      <td>
                                                          Factura de venta#  : <br>
                                                          Fecha Atual: <?php echo date("Y-m-d");?><br>
                                                          Fecha Compra: <?php echo date("Y-m-d");?> 
                                                          trolling:
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
                                          </td>
                                              
                                          <td>
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
              </div>
          </div>

    @stop
    
    @section('css')
        
        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }
            
            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }
            
            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }
            
            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }
            
            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }
            
            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }
            
            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }
            
            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }
            
            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }
            
            .invoice-box table tr.item td{
                border-bottom: 1px solid #eee;
            }
            
            .invoice-box table tr.item.last td {
                border-bottom: none;
            }
            
            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }
            
            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
                
                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }
            
            /** RTL **/
            .rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }
            
            .rtl table {
                text-align: right;
            }
            
            .rtl table tr td:nth-child(2) {
                text-align: left;
            }
        </style>
    @stop
    
    @section('js')
    
    @stop
    
    
    
    
    

    




        

      
