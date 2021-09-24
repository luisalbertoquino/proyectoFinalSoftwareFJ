@extends('adminlte::page')

@section('title', 'Descripcion')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs--> 

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Descripcion</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header" style="text-align: center;font-size:15px; color:#34495E ;font-weight: bold;">
              <i class="fa fa-bar-chart"></i>&nbsp&nbsp
              DETALLE DEL MOVIMIENTO
              <span style="float: left">
                <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </span>
              <br>
              <!--primero por fechas-->
              <div class="row">
                <!--fecha de creacion-->
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de creación:') }}</label>
                      <div class="col-md-6">
                        <input type="text" readonly name="start" value=" @if($data->crated_at!='null'){{$data->created_at}}@endif" class="form-control">
                      </div>
                    </div>
                </div>
                <!--Autor-->
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Autor:') }}</label>
                    <div class="col-md-6">
                      <input type="text" readonly name="start" value=" @if($user==null)Sin Autor @else{{$user->nombre}} {{$user->apellido}}@endif" class="form-control">
                    </div>
                  </div>
                  
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                      <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Motivo') }}</label>
                      <div class="col-md-6">
                        <input type="text" readonly name="start" value="{{$data->concept}}" class="form-control">
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group row">
                      <label for="categoria" class="col-md-6 col-form-label text-md-right">{{ __('Tipo de movimiento') }}</label>
                      <div class="col-md-6">
                        <input type="text" readonly name="start" value=" @if($data->type=='add') Ingreso @else Retiro @endif" class="form-control">
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group row">
                      <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Cuenta') }}</label>
                      <div class="col-md-6">
                        <input type="text" readonly name="start" value="{{$data->name_a->name}}" class="form-control">
                      </div>
                    </div>
                </div>

              </div>
            </div>
            <div class="card-body">
              <table  class="table table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>N° Ref</th>
                    <th>Categoria</th>
                    <th>Atributo</th>
                    <th>Impuesto</th>
                    <th>Monto</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->factura}}</td>
                    <td>{{$data->name_c->name}}</td>
                    @if($data->name_atr)
                    <td>{{$data->name_atr->name}}</td>
                    @else
                    <td>No aplica</td>
                    @endif
                    <td>{{$data->tax}}</td>
                    <td>{{ number_format($data->amount, 2, '.', ',') }}</td>
                  </tr>
  
                  </tbody>
              </table>

              <!--adjunto-->
              
              @if($data->attached)
                <!-- accepted payments column -->
                
                  <div class="form-group row">
                    <label for="categoria" class="col-md-6 col-form-label text-md-right">{{ __('Adjuntos') }}</label>
                    <div class="col-md-6">
                      <a href="/download/{{$data->attached->id}}" target="_blank" class="">
                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">Descargar Adjunto.
                        <i class="fa fa-paperclip pull-right"></i>
                        </p>
                      </a>
                    </div>
                  </div>
              
              @endif
            </div>
            <div class="card-footer small text-muted" style="text-align: center">Updated <input type="datetime" style="text-align: center" name="fecha"  readonly="true" value="<?php echo date("Y-m-d\TH-i");?>">
            </div>

        </div>


        
@stop

    
@section('css')
        
	<link rel="stylesheet" href="/css/formulario.css">
@stop
    
@section('js')
    <script src="/js/Chart.js"></script>
    <script src="/js/Chart.min.js"></script>
    <script src="/js/custom.js"></script>
    <script>

      $(document).ready(function() {
        $('.js-example-theme-single').select2({theme:"classic"});
          $('#dataTable').DataTable({
              
          });
          //modal
          

          });
  </script>
@stop
    	
												

