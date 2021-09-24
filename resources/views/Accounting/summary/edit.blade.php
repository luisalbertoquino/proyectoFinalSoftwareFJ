@extends('adminlte::page')

@section('title', 'Editar Resumen Financiero')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Editar Resumen Financiero</li>
          </ol>
            
        <div class="table-responsive">
          <div class="card mb-3" style="width: 40rem; margin: auto"> 
              <div class="card-header" style="text-align: center">EDITAR MOVIMIENTO&nbsp&nbsp<i class="fas fa-chart-line"></i>
                  <!--boton regresar-->
                  <span style="float: left">
                      <a href="{{url()->previous()}}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                  </span>
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
          
                      <form role="form" action = "/summary/editar/{{$data->id}}" method="post"  enctype="multipart/form-data">
                        
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        @csrf
                      <!-- Modal content-->
                      <div  id="modal" class="modal" >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" id="closemodal" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Subcategorias</h4>
                            </div>
                            <div class="modal-body" id="res_ajax">
                            
                            </div></br>
                            <div class="modal-footer">
                            
                            </div>
                          </div>

                        </div>
                      </div>
                      <div  id="modal1" class="modal" >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" id="closemodal1" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Fecha de salida de tours</h4>
                            </div>
                            <div class="modal-body" id="res_ajax1">
                            
                            </div></br>
                            <div class="modal-footer">

                            <button  style=" margin: 15px;" type="button" id="closemodal2" class="btn btn-default" data-dismiss="modal">Ok</button>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!--formulario-->


                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Motivo') }}</label>
                        <div class="col-md-6">
                          <input required maxlength="200" type="text" name="concept" value="{{$data->concept}}" class="form-control" placeholder="Motivo">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de movimiento') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" name="type">
                            @if($data->type=='add')
                              <option value="add" selected>
                                      Abono
                                      </option>
                                      <option value="out" >
                                      Retiro
                              </option>
                            @else
                              <option value="out" selected>
                              Retiro
                              </option>
                              <option value="add" >
                                      Abono
                              </option>
                            @endif
                              
                            
                            
                            
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>
                        <div class="col-md-6">
                          <input type="text"  step="any" required maxlength="200"  data-mask-reverse="true" step="0.01"  name="amount"  value="<?php echo $data->amount ?>" class="form-control" placeholder="Monto del Movimiento">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Impuesto') }}</label>
                        <div class="col-md-6">
                          <input type="text" maxlength="200" name="tax" value="<?php echo $data->tax ?>"      data-mask-reverse="true" class="form-control" placeholder="Impuesto">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('N° Ref') }}</label>
                        <div class="col-md-6">
                          <input  maxlength="200" name="factura" value="{{$data->factura}}" type="text" class="form-control"  placeholder="N° Ref">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Cuentas') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" name="account_id">
                            @foreach ($account as $accounts)
                              @if($data->account_id == $accounts->id)
                                <option value="{{$accounts->id}}" selected>
                                      {{$accounts->name}}
                                </option>
                              @else
                              <option value="{{$accounts->id}}" >
                                    {{$accounts->name}}
                              </option>                 
                              @endif
                              @endforeach
                                
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                        <div class="col-md-6">
                          <select class="form-control" id="categorie_select" name="categories_id">
                            @foreach ($categories as $categoriess)
                            @if($data->categories_id == $categoriess->id)
            
                              <option value="{{$categoriess->id}}" selected >
                                    {{$categoriess->name}}
                              </option>
                              @else
                              @if($categoriess->id!=1)
            
                              <option value="{{$categoriess->id}}" >
                                    {{$categoriess->name}}
                              </option>
                              @endif
                              @endif
                              @endforeach
                                
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Productos') }}</label>
                        <div class="col-md-6">
                          <select  class="form-control" name="tours_id" id="tours_select">
                            <option class="" value="">No Aplica</option>
                            @foreach ($tours as $tour)       
                              <option class="attr-{{$tour->valorVenta}}" value="{{ $tour->id }}">
                                {{ $tour->nombreProducto }} 
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
                        <div class="col-md-6">
                          <?php  $datef= date_create($data->created_at); 
                              $fecha=date_format($datef, 'Y-m-d ');
                          ?>
                          <input required class="form-control" name="created_at" type="date" value="<?php echo date('Y-m-d',strtotime($fecha)) ?>"/>
                        </div>
                      </div>
                  
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-alt"></i>  Actualizar</button>
    
                    @if($data->attached)
                      <a href="/attached/edit/{{$data->attached->id}}" class="btn btn-primary  waves-effect waves-light" style="float: right;"><i class="fa fa-paperclip"></i>  Editar Adjunto</a>
                    @else
                      <a href="/attached/create/{{$data->id}}" class="btn btn-primary  waves-effect waves-light" style="float: right;"><i class="fa fa-paperclip"></i>  Agregar Adjunto</a>
                    @endif
                  </form>
            
            </div>
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
		
												

	


