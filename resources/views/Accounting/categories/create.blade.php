@extends('adminlte::page')

@section('title', 'Crear Categoria Nueva')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Crear Categoria Nueva</li>
          </ol>
 
        <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">CREAR CATEGORIA CONTABLE&nbsp&nbsp<i class="fab fa-stack-overflow"></i>
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
                  <form role="form" id="msform2" action = "/categories/save" method = "post">
                          @csrf
                          <!--formulario-->
                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Categoria') }}</label>
                            <div class="col-md-6">
                              <input type="text" required maxlength="200" name="name"  class="form-control" placeholder="Nombre de la categoria">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                              <input required maxlength="200" name="description" type="text"   class="form-control"  placeholder="descripción de la categoria">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Categoria') }}</label>
                            <div class="col-md-6">
                              <select name="type" class="form-control">
                                <option value="add" >Categoria de entrada</option>
                                <option value="out" >Categoria de Retiro</option>
                              </select>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp&nbspRegistrar</button>
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
		

