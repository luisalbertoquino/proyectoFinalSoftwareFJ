@extends('adminlte::page')

    @section('title', 'Ventas')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Home</a>
          </li>
          <li class="breadcrumb-item active">Ventas</li>
          <form method="get" action="/sale/create" style="margin-left: auto;">
            <button type="submit" class="btn btn-primary" >
              {{ __('Nueva Venta') }}&nbsp&nbsp<i class="fas fa-cart-plus"></i>
          </button>
            </form>
        </ol>

        @php
          $fecha = date('Y-m-d');
          
        @endphp
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
            <i class="fas fa-paste"></i>&nbsp&nbsp
            GESTIONAR VENTAS
            <span style="float: right">
              <a title="Imprimir registros de tabla" href="/sale3" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
          </span>
          </div>
            
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th title="Numero de Venta" style="width:20px;"><i class="fa fa-book" aria-hidden="true"></i></th>
                    <th style="text-align: center;">Serie</th>
                    <th style="text-align: center;">Vendedor</th>
                    <th style="text-align: center;">Subtotal</th>
                    <th style="text-align: center;">Iva</th>
                    <th style="text-align: center;">Total</th>
                    <th style="text-align: center;">Cliente</th> 
                    <th style="text-align: center;">Fecha</th>
                    <th style="text-align: center;">Estado</th>
                    <th style="text-align: center;">Ver</th>
                    <th style="text-align: center;">Imprimir</th>
                    <th style="text-align: center;">Exportar</th>
                    <th style="text-align: center;">Anular</th>
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <th style="text-align: center;">Eliminar</th>
                    @endif
                  </tr>
                </thead>

                <tbody> 
                  @php
                      $acum= null;
                      $facturaNo=0;
                      $fechaEmision=0;
                      $nombreC=0;
                      $apellidoC=0;
                      $numeroDocumento=0;
                      $nombre=0;
                      $apellido=0;
                      $subtotal=0;
                      $ivaAcum=0;
                      $totalDescontado=0;
                      $total=0;
                  @endphp
                  @foreach ($venta as $ventas)
                  @if($acum != $ventas->serialVenta)
                  <tr>
                    <td style="width:20px;">{{$ventas->numeroVenta}}</td>
                    <!--numeroventa para la factura-->
                    @php
                    $facturaNo=$ventas->numeroVenta;
                    @endphp
                    <td style="width:80px;">{{$ventas->serialVenta}}</td>
                    <!--serialventa para la factura-->
                    @php
                    $serialVenta=$ventas->serialVenta;
                    @endphp
                    <td style="width:80px;">{{$ventas->usuario['nombre']}}&nbsp{{$ventas->usuario['apellido']}}</td>
                    <!--nombre apellido vendedor para la factura-->
                    @php
                    $nombre=$ventas->usuario['nombre'];
                    $apellido=$ventas->usuario['apellido'];
                    @endphp
                    <td style="width:50px;">${{$ventas->subtotal}}.00</td>
                    <!--subtotal para la factura-->
                    @php
                    $subtotal=$ventas->subtotal;
                    $totalDescontado=$ventas->totalDescontado;
                    @endphp
                    <td style="width:50px;">${{$ventas->ivaAcum}}.00</td>
                    <!--iva acumulado para la factura-->
                    @php
                    $ivaAcum=$ventas->ivaAcum;
                    @endphp
                    <td style="width:50px;">${{$ventas->total}}.00</td>
                    <!--total para la factura-->
                    @php
                    $total=$ventas->total;
                    @endphp
                    <td style="width:80px;">
                      @php
                        $flag=0    
                      @endphp
                      @foreach($cliente as $clienter)
                      @if($ventas->idCliente==$clienter->id)
                        @php
                            $flag=1
                        @endphp
                        @if ($clienter->estado==1)
                        {{$clienter->numeroDocumento}}<br>{{$clienter->nombre}}<br>{{$clienter->apellido}}
                          <!--nombre apellido documento cliente para la factura-->
                          @php
                            $numeroDocumento=$clienter->numeroDocumento;
                            $nombreC=$clienter->nombre;
                            $apellidoC=$clienter->apellido;
                          @endphp
                          
                        @else
                        Cliente Desvinculado
                            <!--nombre apellido documento cliente para la factura-->
                            @php
                              $numeroDocumento=$clienter->numeroDocumento+DESV;
                              $nombreC=$clienter->nombre+DESV;
                              $apellidoC=$clienter->apellido+DESV;
                            @endphp
                        
                        @endif
                      @endif
                      @endforeach
                      @if ($flag==0)
                          Cliente Anonimo
                            <!--nombre apellido documento cliente para la factura-->
                            @php
                              $numeroDocumento='cliente anonimo';
                              $nombreC='cliente anonimo';
                              $apellidoC='cliente anonimo';
                            @endphp
                      @endif
                    </td> 
                    <td style="width:90px;">{{$ventas->fechaEmision}}</td>
                        <!--fechaventa para la factura-->
                        @php
                        $fechaEmision=$ventas->fechaEmision;
                        @endphp
                    <td style="text-align: center;width:30px">
                        @if ($ventas->estado==0)
                        <button class="btn btn-danger" type="submit" disabled>Cancelado</button>
                        @else
                        <button class="btn btn-success" type="submit" disabled>Pagado</button>
                        @endif
                    </td>  
                    <!--ver-->
                    <td style="width:50px; text-align:center">
                      <a class="btn btn-warning active" style="color:#ffff" href="/sale/{{$ventas->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>

                    <!--imprimir /sale4/$venta->id-->
                  <td style="width:30px; text-align:center">
                    <a title="Imprimir" class="btn btn-primary" href="javascript:void(0)" onclick="cache({{$ventas->id}})"><i class="fa fa-print" aria-hidden="true"></i></a>
                  </td> 

                    <!--exportar-->
                    <td style="width:30px; text-align:center">
                      <a class="btn btn-danger" href="/sale2/{{$ventas->id}}" id="download"><i class="fas fa-file-pdf"></i></a>
                    </td>

                    <!--anular-->
                    <td style="text-align: center;width:30px">
                      <form action="/sale/estado/{{$ventas->id}}" method="POST">
                        @method('PATCH')
                      {{csrf_field()}}
                        @if ($ventas->estado==0)
                            @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true)
                              <button class="btn btn-danger" type="submit" ><i class="fas fa-minus-circle"></i></button>
                            @else
                              <button class="btn btn-danger" disabled type="submit" ><i class="fas fa-minus-circle"></i></button>
                            @endif
                        @else
                        <button class="btn btn-success" type="submit" ><i class="fas fa-minus-circle"></i></button>
                        @endif
                      </form>
                    </td>

                    <!--eliminar (solo admin)-->
                    @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true)
                    <td style="text-align: center;width:50px;">
                            <a class="btn btn-danger"  href="javascript:void(0)"  data-toggle="modal" data-target="#deleteModal" data-postid="{{$ventas->id}}"><i class="fas fa-trash"></i></a>
                    </td>
                    @endif
                  </tr>
                  @php
                      $acum=$ventas->serialVenta;
                  @endphp
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted" style="text-align: center">Ultima Actualización <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
        </div>

        <!-- delete Modal--> 
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro/a de que quieres eliminar esta venta?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar esta venta.</div>
            <div class="modal-footer">
            
            <form method="POST" action="">
            @method('DELETE')
                @csrf
                <a class="btn btn-primary" onclick="$(this).closest('form').submit();" href="#">Eliminar</a>
            </form>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        </div>
      </div>

      @php
          $fecha = date('Y-m-d');
        
      @endphp

        <!-- factura Modal-->
        <div class="modal fade" id="facturaPrevia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                          <div class="invoice-box"> 
                            <div class="table-responsive">
                                <table class="table" id="tablita" cellpadding="0" cellspacing="0" style="background-image: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url({{{$config->nombreLogo}}}); background-repeat: no-repeat;">
                                    
                                    <tr class="top">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td class="title">
                                                        <img  src="{{$config->logo}}" style="width:100px; max-width:300px;" alt="Si Hay logo">
                                                    </td>
                                                    <td>
                                                        Factura de venta#  : {{$facturaNo }}<br>
                                                        Fecha Atual: <?php echo date("Y-m-d");?><br>
                                                        Fecha Venta: {{$fechaEmision}} 
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
                                            Datos Cliente:
                                        </td>
                
                                        <td>
                                            Vendedor:
                                        </td>
                                        
                                        
                                    </tr>
                                    
                                    <tr class="details">
                                        <td>
                                            <label id="clienter" type="text"></label>
                                            Nombre:     {{$nombreC}}<br>
                                            Apellido:   {{$apellidoC}}<br>
                                            # Documento:{{$numeroDocumento}}<br>
                                        </td>
                                        
                                        <td>
                                            {{$nombre}} {{$apellido}}
                
                                        </td> 
                                    </tr>
                
                                    <tr class="heading">
                                        <td>
                                            Producto/Cantidad:
                                        </td>
                                        <td>
                                            Total $$:
                                        </td>
                                    </tr>
                                    
                                  
                                    <tr class="item">
                                        <td>
                                            @foreach ($venta as $ventass)
                                                @if ($serialVenta==$ventass->serialVenta)
                                                
                                                  @foreach ($producto as $productos)
                                                    @if ($ventass->idProducto==$productos->id)
                                                    {{$productos->nombreProducto}}/{{$ventass->cantidadProducto}}<br>
                                                    @endif
                                                  @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                                            
                                        <td>
                                          @foreach ($venta as $ventass)
                                          @if ($serialVenta==$ventass->serialVenta)
                                            @foreach ($producto as $product)
                                              @if ($ventass->idProducto==$product->id)
                                              ${{$product->valorVenta}}.00<br>
                                              @endif
                                            @endforeach
                                          @endif
                                      @endforeach
                                        </td>
                                    </tr>
            
                                    
                                    
                                    <tr class="total">
                                        <td></td>
                                        
                                        <td>
                                            SubTotal:${{$subtotal}}.00<br>
                                            Total-Impuestos:${{$ivaAcum}}.00 <br>
                                            Descuento:${{$totalDescontado}}.00 <br>
                                            Total:${{$total}}.00
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        
                          </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" id="post_id" name="post_id" value="">
              <button class="btn btn-success" type="button" data-dismiss="modal" href="javascript:void(0)">Aceptar</button>
              </div>
          </div>
          </div>
      </div>          

        @include('Partials.alertVenta')
        
    @stop
    
    @section('css')
    <!--opcion vista previa de la compra antes de cerrar esa porkeria xd-->
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
        <script src="/js/jQuery.print.min.js"></script>
        <script>
          window.onload = function() {document.getElementById('facturaPrevia1').click();}
        </script>
        <script>
          $('#deleteModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var post_id = button.data('postid') 
              var modal = $(this)
              modal.find('.modal-footer #post_id').val(post_id);
              modal.find('form').attr('action','/sale/'+post_id);
          })
        </script> 
        <script>
          $(document).ready(function() {
              $('.js-example-theme-single').select2({theme:"classic"});
              $('#dataTable').DataTable({
                bSort: false,
              });

          });
          </script>
          <script>
          //para imprimir
          function cache(idd){
                let CSRF_TOKEN = $('meta[name="csrf-token"').attr('content');
                $.ajaxSetup({
                  url: '/sale4/'+idd,
                  type: 'get',
                  data: { 
                  }
                });

                $.ajax({
                  success: function(viewContent) {
                    $.print(viewContent); // This is where the script calls the printer to print the viwe's content.
                  }
                });
          }

            

        </script> 
    @stop
    
