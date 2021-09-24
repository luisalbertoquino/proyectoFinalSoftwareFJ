@extends('adminlte::page')

    @section('title', 'Crear Nueva Cuenta')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Añadir nueva cuenta</li>
          </ol>

        <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">CREAR NUEVA CUENTA&nbsp&nbsp<i class="fas fa-university"></i>
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
                      <form role="form" id="msform2" action = "/account/save" method = "post">
                          @csrf
                          <!--formulario-->
                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del banco') }}</label>
                            <div class="col-md-6">
                              <input type="text" name="name" required maxlength="200"  class="form-control" placeholder="Nombre del banco">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Cuenta') }}</label>
                            <div class="col-md-6">
                              <input name="number" type="number" required maxlength="200"  class="form-control"  placeholder="Numero de cuenta">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Cuenta') }}</label>
                            <div class="col-md-6">
                              <select class="form-control" required  name="type">
                                <option value="corriente">Corriente</option>
                                <option value="ahorro">Ahorro</option>
                              </select>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success">Guardar</button>
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

    
		
    
    

