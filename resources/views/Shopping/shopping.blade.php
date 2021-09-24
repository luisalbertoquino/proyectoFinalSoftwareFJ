@extends('adminlte::page')

    @section('title', 'Compras')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/home">Home</a>
        </li> 
        <li class="breadcrumb-item active">Compras</li>
        <form method="get" action="/shopping/create" style="margin-left: auto;">
          <button type="submit" class="btn btn-primary" >
            {{ __('Nueva Compra') }}&nbsp&nbsp<i class="fas fa-cart-plus"></i>
        </button>
          </form>
      </ol> 

      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
          <i class="fas fa-dolly"></i>&nbsp&nbsp
          GESTIONAR COMPRAS
          <span style="float: right">
            <a title="Imprimir registros de tabla" href="/shopping3" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
        </span>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th style="text-align: center;">serie</th>
                  <th style="text-align: center;">N° Comprobante</th>
                  <th style="text-align: center;">Fecha</th>
                  <th style="text-align: center;">Proveedor</th>
                  <th style="text-align: center;">Estado</th>
                  <th style="text-align: center;">Ver</th>
                  <th style="text-align: center;">Imprimir</th>
                  <th style="text-align: center;">Exportar</th>
                  <th style="text-align: center;">Anular</th>
                  
                  
                </tr>
              </thead>
  

              <tbody>
                @php
                    $acum= null;
                @endphp
                @foreach ($compra as $compra)
                @if($acum != $compra->serieComprobante)
                <tr>
                  <td style="width:80px;">{{$compra->serieComprobante}}</td>
                  <td style="width:80px;">{{$compra->numeroComprobante}}</td>
                  <td style="width:90px;">{{$compra->fechaEmision}}</td>
                  <!--proveedor-->
                  <td style="width:150px;">
                    @php
                      $flag=0    
                    @endphp
                    @foreach($proveedor as $proveedore)
                    @if($compra->idProveedor==$proveedore->id)
                      @php
                          $flag=1
                      @endphp
                      @if ($proveedore->estado==1)
                        {{$proveedore->razonSocial}}
                      @else
                      Proveedor Desvinculado
                      @endif
                    @endif
                    @endforeach
                    @if ($flag==0)
                      Proveedor No Oficial
                    @endif
                    </td>
                  <td  style="text-align: center;width:100px;">
                    <!--cambiar estado-->
                      @if ($compra->estado==0)
                      <button class="btn btn-danger" type="submit" disabled>Cancelado</button>
                      @else
                      <button class="btn btn-success" type="submit" disabled>Pagado</button>
                      @endif
                    </td> 
                </td>
                 <!--ver-->
                 <td style="width:50px; text-align:center">
                   <a class="btn btn-warning active" style="color:#ffff" href="/shopping/{{$compra->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                 </td>

                 <!--imprimir-->
                 <td style="width:30px; text-align:center">
                  <a title="Imprimir" class="btn btn-primary" href="javascript:void(0)" onclick="cache('{{$compra->id}}')"><i class="fa fa-print" aria-hidden="true"></i></a>
                 </td>

                 <!--exportar-->
                 <td style="width:30px; text-align:center">
                  @if ($compra->summarys['id']==true)
                    @foreach($archivo as $comprobante)
                     @if($comprobante->summary_id==$compra->summarys['id'])
                      <a title="Imprimir" href="/download/{{$comprobante->id}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                     @endif
                    @endforeach
                      
                  @else
                    pdf no disponible
                  @endif
                   
                 </td>

                 <!--anular-->
                 <td style="text-align: center;width:30px">
                   <form action="/shopping/estado/{{$compra->id}}" method="POST">
                     @method('PATCH')
                   {{csrf_field()}}
                     @if ($compra->estado==0)
                     @if(Auth::user()->permissions->contains('slug', 'administrador-main')==true || Auth::user()->permissions->contains('slug', 'administrador')==true)
                      <button class="btn btn-danger" type="submit" ><i class="fas fa-minus-circle"></i></button>
                        @else
                        <button class="btn btn-danger" disabled type="submit" ><i class="fas fa-minus-circle"></i></button>
                        @endif
                     @else
                     <button class="btn btn-success" type="submit" ><i class="fas fa-minus-circle"></i></button>
                     @endif
                   </form>
                  
                </tr>
                    @php
                      $acum=$compra->serieComprobante;
                    @endphp
                    @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>"></div>
      </div>
    @stop
    
    @section('css')
        
    @stop
    
    @section('js')
    s<script src="/js/jQuery.print.min.js"></script>
      <script>
        $(document).ready(function() {
            $('.js-example-theme-single').select2({theme:"classic"});
            $('#dataTable').DataTable({
              
            });

        });
      </script>
      <script>
        //para imprimir
        function cache(idd){
              let CSRF_TOKEN = $('meta[name="csrf-token"').attr('content');
              
              $.ajaxSetup({ 
                url: '/shopping4/'+idd,
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
