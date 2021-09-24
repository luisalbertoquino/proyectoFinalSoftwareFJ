@extends('adminlte::page')

    @section('title', 'Actualizar Cuenta')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')
 
    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Editar cuenta</li>
          </ol>

          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">EDITAR CUENTA&nbsp&nbsp<i class="fas fa-university"></i>
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
                        <form role="form" id="msform2" action = "/account/editar/{{$data->id}}" method="post">
                          {{method_field('PUT')}}
                          {{ csrf_field() }}
                          <!--formulario-->
                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del banco') }}</label>
                            <div class="col-md-6">
                              <input type="text" required maxlength="200" name="name" value="{{$data->name}}" class="form-control" placeholder="Nombre del banco">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Cuenta') }}</label>
                            <div class="col-md-6">
                              <input name="number" required maxlength="200" type="number" value="{{$data->number}}"  class="form-control"  placeholder="Numero de cuenta">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Cuenta') }}</label>
                            <div class="col-md-6">
                              <select  required  class="form-control" name="type">
                                @if($data->type=='ahorro')
                                  <option value="ahorro" selected>ahorro</option>
                                  <option value="corriente" >corriente</option>
                                @else
                                  <option value="corriente" selected>corriente</option>
                                  <option value="ahorro" >ahorro</option>
                                @endif
                              </select>
                            </div>
                          </div>

                        
                            <button type="submit" class="btn btn-success">Editar</button>
                            
                        

                          
                      </form>
              
              </div>
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

    
		

