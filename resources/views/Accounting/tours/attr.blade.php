@extends('adminlte::page')

@section('title', 'Productos')
    
@section('content_header')
      <br>
@stop
    
@section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>

          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-code-fork"></i><h3 class="box-title">Datos del tour</h3>
              <div>
              	<button class="btn btn-primary pull-right" type="button" id="btn_add_attr2">
              		<i class="fa fa-plus"></i>
              	</button>
                 <button class="btn btn-primary pull-right" type="button" id="buttonremove">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/tours/tours/attr/{{$tours->id}}" method = "post">
            {{ csrf_field() }}	
             
                <div class="form-group col-sm-6">
                  <label for="exampleInputPassword1">Fecha de Salida</label>
                  <input required maxlength="200" name="date[]" type="date"   class="form-control"  placeholder="Fecha">
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputPassword1">Precio</label>
                  <input required maxlength="200" name="price[]" type="text"   data-mask="000,000,000,000,000.00" data-mask-reverse="true"    class="form-control"  placeholder="Precio">
                </div>
               <div class="box-body" id="list_attr2">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
                </form>

              <div class="box-footer">
             
                <a href="/tours/tours"> <button class="btn btn-primary pull-right">Seguir Sin Guardar</button></a>
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
		

