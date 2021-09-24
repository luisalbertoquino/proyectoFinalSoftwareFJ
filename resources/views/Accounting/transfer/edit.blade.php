@extends('adminlte::page')

@section('title', 'Editar Transferencia')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Editar Transferencia</li>
          </ol>


          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">EDITAR TRANSFERENCIA ENTRE CUENTAS&nbsp&nbsp<i class="fa fa-bar-chart"></i>
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
                      <form id="search-form" role="form" action = "/transfer/editar/{{$add->id_transfer}}" method="post"  enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                          <!--formulario-->
                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Transferir dinero desde :') }}</label>
                            <div class="col-md-6">
                              <select required="" autofocus="autofocus"  id="origen" autofocus="autofocus" class="form-control" name="origen">
                                <option value="" selected>Seleccion</option>
                                @foreach ($account as $datas) 
                                @if($add->account_id==$datas->id)   
                                  <option selected value="{{ $datas->id }}">{{ $datas->name}} </option>
                                @else
                                    <option  value="{{ $datas->id }}">{{ $datas->name}} </option>
                                @endif 
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione destino :') }}</label>
                            <div class="col-md-6">
                              <select  required  id="destino"  class="form-control" name="destino">
                                <option value="" selected>Seleccion</option>
                                @foreach ($account as $datas) 
      
                                @if($out->account_id==$datas->id)   
                                  <option selected value="{{ $datas->id }}">{{ $datas->name}} </option>
                                @else
                                  <option  value="{{ $datas->id }}">{{ $datas->name}} </option>
                                @endif
                                
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group row" id="res_destino"></div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Monto') }}</label>
                            <div class="col-md-6">
                              <?php  $num1=$out->amount.'.00'  ?>
                        <input id="amount" autofocus="autofocus" required value="<?php echo $num1 ?>"  name="amount" type="text"   data-mask="000,000,000,000,000.00" max="" data-mask-reverse="true"    class="form-control"  placeholder="Monto">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
                            <div class="col-md-6">
                              <?php  $datef= date_create($out->created_at); 
                                $fecha=date_format($datef, 'Y-m-d ');
                              ?>
                                <input required class="form-control" name="created_at" type="date" value="<?php echo date('Y-m-d',strtotime($fecha)) ?>"/>
                            </div>
                          </div>

                          <input name="categories_id"  value="1" type="hidden"  >
                          <button type="submit" class="btn btn-success">Modificar</button>
                      </form>
              
              </div>
          </div> 



        
@stop

    
@section('css')
        
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
		


