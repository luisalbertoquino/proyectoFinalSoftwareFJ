@extends('adminlte::page')

@section('title', 'ATTR')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Crear ATTR</li>
          </ol>

 
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">Crear subcategorias contables&nbsp&nbsp<i class="fas fa-code-branch"></i>
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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                              <input required maxlength="200" name="name_[]" type="text"   class="form-control"  placeholder="Valor">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>
                            <div class="col-md-6">
                              <input required maxlength="200" name="value_[]" type="text"   class="form-control"  placeholder="Valor">
                            </div>
                          </div>
                          <div class="d-inline-flex p-2">
                            <button class="btn btn-success pull-right" type="button" id="btn_add_attr">
                              <i class="fa fa-plus"></i>
                            </button>
                          </div>
                          
                          <div class="d-inline-flex p-2">
                            <button class="btn btn-danger pull-right" type="button" id="buttonremove">
                              <i class="fa fa-minus"></i>
                            </button>
                          </div>

                          <div class="form-group row" id="list_attr">
                            
                          </div>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          <a href="/categories/categories" style="text-align: center"> <button class="btn btn-info pull-right">No registrar subcategoria</button></a>
 
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
		

