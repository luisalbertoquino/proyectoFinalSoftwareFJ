@extends('adminlte::page')

@section('title', 'Editar Categoria')
    
@section('content_header')
      <br>
@stop
     
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Editar Categoria</li>
          </ol>
        
          <div class="table-responsive">
            <div class="card mb-3" style="width: 40rem; margin: auto"> 
                <div class="card-header" style="text-align: center">EDITAR CATEGORIA CONTABLE&nbsp&nbsp<i class="fa fa-edit"></i>
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
                        <form role="form" action = "/categories/editar/{{$data->id}}" method="post">
                          @method('PATCH')
                          @csrf 

                          <!--formulario-->
                          <button class="btn btn-success pull-right" type="button" id="btn_add_attr">
                            <i class="fa fa-plus"></i>
                          </button>
                           <button class="btn btn-danger pull-right" type="button" id="buttonremove">
                            <i class="fa fa-minus"></i>
                          </button>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Categoria') }}</label>
                            <div class="col-md-6">
                              <input required maxlength="200" type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nombre de la categoria ">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                              <input required maxlength="200" name="description" type="text" value="{{$data->description}}"  class="form-control"  placeholder="descriptión">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Categoria') }}</label>
                            <div class="col-md-6">
                              <select name="type" class="form-control">
                                  @if($data->type=='add')
                                    <option value="add" selected>Categoria de entrada</option>
                                    <option value="out">Categoria de Retiro</option>
                                  @else
                                    <option value="add" >Categoria de entrada</option>
                                    <option value="out" selected>Categoria de Retiro</option>
                                  @endif
                              </select>
                            </div>
                          </div>

                          @foreach ($data1 as $data1s)
                          
                              <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Elimiar subcategoria') }}</label>
                                <div class="col-md-6">
                                  <a onclick='if(confirmDel() == false){return false;}' href="/categories/eliminarattr/{{$data1s->id}}"><i class="fa fa-trash"></i></a> 
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                  <input type="hidden" value="{{$data1s->id}}" name="id[]">
                                    <input required maxlength="200" name="name_[]" type="text" value=" {{$data1s->name}}"  class="form-control"  placeholder="Nombre de la subcategoria">
                                </div>
                              </div> 

                              <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>
                                <div class="col-md-6">
                                  <input required maxlength="200" name="value_[]" type="text" value=" {{$data1s->value}}"  class="form-control"  placeholder="valores">
                                </div>
                              </div>

                              
                          @endforeach

                              <div class="form-group row" id="list_attr">
                            
                              </div>
                        
 
                            <button type="submit" class="btn btn-success">Actualizar</button>

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
		
												

	


