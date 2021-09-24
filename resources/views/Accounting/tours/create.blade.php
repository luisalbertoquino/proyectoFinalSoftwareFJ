@extends('adminlte::page')

@section('title', 'Crear Producto')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Crear Producto</li>
          </ol>

          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-code-fork"></i><h3 class="box-title">Crear Tour</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/tours/save" method = "post">
            {{ csrf_field() }}	
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del tour</label>
                  <input type="text" required maxlength="200" name="name"  class="form-control" placeholder="Nombre de la categoria">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descripción</label>
                  <input required maxlength="200" name="description" type="text"   class="form-control"  placeholder="descripción de la categoria">
                </div>
               
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
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
		

