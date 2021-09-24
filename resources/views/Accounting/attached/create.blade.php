@extends('adminlte::page')

    @section('title', 'Crear Nuevo Adjunto')
    
    @section('content_header')
      <br>
    @stop
    
    @section('content')

    <!-- Breadcrumbs-->

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home {{$negocio->nombreEmpresa}}</a>
            </li>
            <li class="breadcrumb-item active">Registrar nuevo adjunto</li>
          </ol>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar adjunto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/attached/save" method = "post" enctype="multipart/form-data">
            {{ csrf_field() }}	
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del archivo</label>
                  <input type="file" required name="path"  class="form-control" placeholder="Nombre del archivo">
                  <input type="hidden" name="summary_id" value="{{$data->id}}">
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">fecha de creacion</label>
                  <input name="created_at" type="date"   class="form-control"  placeholder="fecha de creacion">
                </div> -->
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

    
		

